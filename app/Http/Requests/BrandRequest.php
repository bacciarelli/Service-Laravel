<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $nameRules = ($this->route('brand'))
            ? 'required|unique:brands,name,' . $this->route('brand')->id
            : 'required|unique:brands,name';
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
            'name.required'       => trans('Name is required'),
            'name.unique'         => trans('This name already exist')
        ];
    }

}
