<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ComplaintRequest;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Complaint;
use App\Models\DeviceModel;
use App\Models\Type;
use App\Services\ComplaintService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class ComplaintController
 *
 * @package App\Http\Controllers\Admin
 */
class ComplaintController extends Controller
{
    protected $complaintService;

    /**
     * ComplaintController constructor.
     *
     * @param ComplaintService $complaintService ComplaintService object
     */
    public function __construct(ComplaintService $complaintService)
    {
        $this->complaintService = $complaintService;
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
            return $this->complaintService->ajaxResults($request);
        }

        return view('admin.complaint.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $clients = Client::orderBy('name')->pluck('name', 'id');
        $brands = Brand::orderBy('name')->pluck('name', 'id');
        $types = Type::orderBy('name')->pluck('name', 'id');
//        $deviceModels = DeviceModel::orderBy('name')->pluck('name', 'id');
        $statuses = Complaint::getStatusText();

        return view(
            'admin.complaint.create',
            compact('clients', 'brands', 'types', 'statuses')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ComplaintRequest $request Request object
     *
     * @return RedirectResponse
     */
    public function store(ComplaintRequest $request): RedirectResponse
    {
        if ($this->complaintService->save(
            $request->all()
        ) instanceof Complaint) {

            return redirect()
                ->route("admin.complaints.index")
                ->with('alert-success', trans('Complaint was created'));
        }

        return redirect()
            ->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Complaint $complaint complaint model
     *
     * @return View
     */
    public function edit(Complaint $complaint): View
    {
        $clients = Client::orderBy('name')->pluck('name', 'id');
        $brands = Brand::orderBy('name')->pluck('name', 'id');
        $types = Type::orderBy('name')->pluck('name', 'id');
        $deviceModels = DeviceModel::where('type_id', $complaint->device_model_id)
            ->orderBy('name')
            ->pluck('name', 'id');
        $statuses = Complaint::getStatusText();
        return view(
            'admin.complaint.edit',
            compact(
                'complaint', 'clients', 'brands',
                'types', 'deviceModels', 'statuses'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ComplaintRequest $request   Request object
     * @param Complaint        $complaint complaint model
     *
     * @return RedirectResponse
     */
    public function update(
        ComplaintRequest $request,
        Complaint        $complaint
    ): RedirectResponse {

        if ($this->complaintService->save(
            $request->all(),
            $complaint
        ) instanceof Complaint) {

            return redirect()
                ->route("admin.complaints.index")
                ->with('alert-success', trans('Complaint was edited'));
        }

        return redirect()
            ->back()
            ->with('alert-danger', trans('Oops something went wrong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Complaint $complaint complaint model
     *
     * @return RedirectResponse
     */
    public function destroy(Complaint  $complaint): RedirectResponse
    {
        $complaint->delete();
        return redirect()
            ->back()
            ->with('alert-success', trans('Complaint was deleted'));
    }
}
