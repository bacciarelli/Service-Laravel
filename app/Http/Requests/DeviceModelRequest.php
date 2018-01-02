<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceModelRequest extends FormRequest
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
        $nameRules = ($this->route('device_model'))
            ? 'required|unique:device_models,name,' . $this->route('device_model')->id
            : 'required|unique:device_models,name';
        return [
            'name'    => $nameRules,
            'type_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'type_id.required' => trans('Type is required'),
            'name.required'    => trans('Name is required'),
            'name.unique'      => trans('This name already exist')
        ];
    }

}
