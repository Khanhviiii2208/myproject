<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories',
            "meta_description"=> "required",
            'meta_title'=> "required",
            'meta_keyword'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục!',
            'name.unique' => 'Tên danh mục đã được sử dụng!',
            "meta_description"=> "Vui lòng nhập mô tả SEO!",
            'meta_title'=> "Vui lòng nhập tiêu đề SEO",
            'meta_keyword'=>'Vui lòng nhập từ khóa SEO'
        ];
    }
}
