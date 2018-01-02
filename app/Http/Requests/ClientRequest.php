<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $nameRules = ($this->route('client'))
            ? 'required|unique:clients,name,' . $this->route('client')->id
            : 'required|unique:clients,name';
        $numberRules = ($this->route('client'))
            ? 'required|numeric|unique:clients,number,' . $this->route('client')->id
            : 'required|numeric|unique:clients,number';
        return [
            'name'   => $nameRules,
            'number' => $numberRules,
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'   => trans('Name is required'),
            'name.unique'     => trans('This name already exist'),
            'number.numeric'  => trans('Number must be a number'),
            'number.required' => trans('Number is required'),
            'number.unique'   => trans('This number already exist')
        ];
    }

}
