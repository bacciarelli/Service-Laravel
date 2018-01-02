<?php

namespace App\Services;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class TypeService
 *
 * @package App\Services
 */
class TypeService
{

    /**
     * Return types filtered by name
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function ajaxResults(Request $request): View
    {
        $types = Type::orderBy('name');
        if ($request->search != null) {
            $types = $types->where('name', 'like', '%' . $request->search . '%');
        }
        $types = $types->paginate(10);

        return view('admin.type.index-table', compact('types'));
    }

    /**
     * Create or update type
     *
     * @param array     $params new params for type
     * @param Type|null $type   pass type object or new will be created
     *
     * @return Type|null
     */
    public function save(array $params, Type $type = null): ?Type
    {
        app()->db->beginTransaction();

        $type = $type ?? new Type();

        if (array_get($params, 'name')) {
            $type->name = array_get($params, 'name');
        }

        if ($type->save()) {
            app()->db->commit();
            return $type;
        }

        app()->db->rollback();
        return null;
    }
}