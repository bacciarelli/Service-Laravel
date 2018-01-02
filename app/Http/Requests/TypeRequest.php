<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
        $nameRules = ($this->route('type'))
            ? 'required|unique:types,name,' . $this->route('type')->id
            : 'required|unique:types,name';
        return [
            'name' => $nameRules,
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('Name is required'),
            'name.unique'   => trans('This name already exist')
        ];
    }

}
