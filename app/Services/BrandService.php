<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class BrandService
 *
 * @package App\Services
 */
class BrandService
{

    /**
     * Return brands filtered by name
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function ajaxResults(Request $request): View
    {
        $brands = Brand::orderBy('name');
        if ($request->search != null) {
            $brands = $brands->where('name', 'like', '%' . $request->search . '%');
        }
        $brands = $brands->paginate(15);

        return view('admin.brand.index-table', compact('brands'));
    }

    /**
     * Create or update brand
     *
     * @param array      $params new params for brand
     * @param Brand|null $brand  pass brand object or new will be created
     *
     * @return Brand|null
     */
    public function save(array $params, Brand $brand = null): ?Brand
    {
        app()->db->beginTransaction();

        $brand = $brand ?? new Brand();

        if (array_get($params, 'name')) {
            $brand->name = array_get($params, 'name');
        }

        if ($brand->save()) {
            app()->db->commit();
            return $brand;
        }

        app()->db->rollback();
        return null;
    }
}