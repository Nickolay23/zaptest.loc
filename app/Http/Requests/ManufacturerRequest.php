<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManufacturerRequest extends FormRequest
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
        $rules = [
            'manufacturer' => 'required|min:2|max:255|unique:manufacturers,manufacturer',
        ];

        if ($this->route()->named('admin.manufacturers.update')) {
            $rules['manufacturer'] .= ',' . $this->route()->parameter('manufacturer')->id;
        }
        return $rules;
    }
}
