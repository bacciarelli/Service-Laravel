<?php

namespace App\Services;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ComplaintService
 *
 * @package App\Services
 */
class ComplaintService
{

    /**
     * Return complaint filtered by name
     *
     * @param Request $request Request object
     *
     * @return View
     */
    public function ajaxResults(Request $request): View
    {
        $complaints = Complaint::orderBy('created_at');
        if ($request->search != null) {
            $complaints = $complaints
                ->where('number', 'like', '%' . $request->search . '%');
        }
        $complaints = $complaints->paginate(10);

        return view('admin.complaint.index-table', compact('complaints'));
    }

    /**
     * Create or update complaint
     *
     * @param array          $params    new params for complaint
     * @param Complaint|null $complaint pass complaint object
     * or new will be created
     *
     * @return Complaint|null
     */
    public function save(array $params, Complaint $complaint = null): Complaint
    {
        app()->db->beginTransaction();

        $complaint = $complaint ?? new Complaint();

        if (array_get($params, 'number')) {
            $complaint->number = array_get($params, 'number');
        }
        if (array_get($params, 'client_id')) {
            $complaint->client_id = array_get($params, 'client_id');
        }
        if (array_get($params, 'fault_description')) {
            $complaint->fault_description = array_get($params, 'fault_description');
        }
        if (array_get($params, 'notes')) {
            $complaint->notes = array_get($params, 'notes');
        }
        if (array_get($params, 'repair_description')) {
            $complaint->repair_description = array_get($params, 'repair_description');
        }
        if (array_get($params, 'brand_id')) {
            $complaint->brand_id = array_get($params, 'brand_id');
        }
        if (array_get($params, 'device_model_id')) {
            $complaint->device_model_id = array_get($params, 'device_model_id');
        }
        if (array_get($params, 'status')) {
            $complaint->status = array_get($params, 'status');
        }

        if ($complaint->save()) {
            app()->db->commit();
            return $complaint;
        }

        app()->db->rollback();
        return null;
    }
}