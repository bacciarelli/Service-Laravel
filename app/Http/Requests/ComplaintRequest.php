<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ComplaintRequest
 *
 * @package App\Http\Requests
 */
class ComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number'             => 'required',
            'client_id'          => 'required',
            'fault_description'  => 'required',
            'notes'              => 'nullable',
            'repair_description' => 'required',
            'brand_id'           => 'required',
            'device_model_id'    => 'required',
            'status'             => 'required',
        ];
    }

    /**
     * Validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'number.required'             => trans('Number is required'),
            'client_id.required'          => trans('Client is required'),
            'fault_description.required'  => trans('Fault description is required'),
            'repair_description.required' => trans('Repair description is required'),
            'brand_id.required'           => trans('Brand is required'),
            'device_model_id.required'    => trans('Model is required'),
            'status.required'             => trans('Status is required')
        ];
    }

}
