<?php

namespace App\Http\Requests\MyClass;

use Illuminate\Foundation\Http\FormRequest;

class ClassUpdate extends FormRequest
{

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
            'name' => 'required|string|min:3',
            'class_type_id' => 'nullable|exists:class_types,id',
            'subtitle' => 'nullable|string',
            'duration_label' => 'nullable|string',
            'fee_type' => 'nullable|string',
            'mrp_price' => 'nullable|numeric',
            'selling_price' => 'nullable|numeric',
            'class_days' => 'nullable|string',
            'gender_eligibility' => 'nullable|string',
            'overview' => 'nullable|string',
            'thumbnail_url' => 'nullable|string',
            'is_published' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'class_type_id' => 'Program Category',
            'name' => 'Course Title',
        ];
    }
}
