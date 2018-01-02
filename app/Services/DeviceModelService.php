<?php

namespace App\Services;

use App\Models\DeviceModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class DeviceModelService
 *
 * @package App\Services
 */
class DeviceModelService
{

    /**
     * Return deviceModels filtered by name
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function ajaxResults(Request $request): View
    {
        $deviceModels = DeviceModel::orderBy('name');
        if ($request->search != null) {
            $deviceModels = $deviceModels->where('name', 'like', '%' . $request->search . '%');
        }
        $deviceModels = $deviceModels->paginate(10);

        return view('admin.device-model.index-table', compact('deviceModels'));
    }

    /**
     * Create or update deviceModel
     *
     * @param array      $params new params for deviceModel
     * @param DeviceModel|null $deviceModel  pass deviceModel object or new will be created
     *
     * @return DeviceModel|null
     */
    public function save(array $params, DeviceModel $deviceModel = null): ?DeviceModel
    {
        app()->db->beginTransaction();

        $deviceModel = $deviceModel ?? new DeviceModel();

        if (array_get($params, 'name')) {
            $deviceModel->name = array_get($params, 'name');
        }
        if (array_get($params, 'type_id')) {
            $deviceModel->type_id = array_get($params, 'type_id');
        }

        if ($deviceModel->save()) {
            app()->db->commit();
            return $deviceModel;
        }

        app()->db->rollback();
        return null;
    }
}