<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DeviceModelRequest;
use App\Models\DeviceModel;
use App\Models\Type;
use App\Services\DeviceModelService;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class DeviceModelController
 *
 * @package App\Http\Controllers\Admin
 */
class DeviceModelController extends Controller
{
    protected $deviceModelService;

    /**
     * DeviceModelController constructor.
     *
     * @param DeviceModelService $deviceModelService DeviceModelService object
     */
    public function __construct(DeviceModelService $deviceModelService)
    {
        $this->deviceModelService = $deviceModelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function index(Request $request): View
    {
        if ($request->ajax()) {
            return $this->deviceModelService->ajaxResults($request);
        }

        return view('admin.device-model.index');
    }

    /**
     * Returns device models for select
     *
     * @param Type $type type model
     *
     * @return Collection
     */
    public function getDeviceModelByType(Type $type): Collection
    {
        return $type->deviceModels()
            ->orderBy('name')
            ->pluck('name', 'id')
            ->prepend(trans('Select device model'), 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $types = Type::pluck('name', 'id');
        return view('admin.device-model.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DeviceModelRequest $request Request object
     *
     * @return RedirectResponse
     */
    public function store(DeviceModelRequest $request): RedirectResponse
    {
        if ($this->deviceModelService->save(
            $request->all()
        ) instanceof DeviceModel) {

            return redirect()
                ->route("admin.device-models.index")
                ->with('alert-success', trans('Device Model was created'));
        }

        return redirect()
            ->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DeviceModel $deviceModel device model
     *
     * @return View
     */
    public function edit(DeviceModel $deviceModel): View
    {
        $types = Type::pluck('name', 'id');
        return view('admin.device-model.edit', compact('deviceModel', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DeviceModelRequest $request     Request object
     * @param DeviceModel        $deviceModel deviceModel model
     *
     * @return RedirectResponse
     */
    public function update(
        DeviceModelRequest $request,
        DeviceModel        $deviceModel
    ): RedirectResponse {

        if ($this->deviceModelService->save(
            $request->all(),
            $deviceModel
        ) instanceof DeviceModel) {

            return redirect()
                ->route("admin.device-models.index")
                ->with('alert-success', trans('Device Model was edited'));
        }

        return redirect()
            ->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeviceModel $deviceModel device model
     *
     * @return RedirectResponse
     */
    public function destroy(DeviceModel  $deviceModel): RedirectResponse
    {
        $deviceModel->delete();
        return redirect()
            ->back()
            ->with('alert-success', trans('Device Model was deleted'));
    }
}
