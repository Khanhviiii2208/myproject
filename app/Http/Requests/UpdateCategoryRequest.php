<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            //
            'name' => 'required',
            'meta_keyword' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ];
    }
    public function messages(): array
    {
        return[
            'name.required' => 'Không được để trống tên danh mục',
            'meta_keyword.required' => 'Không được để trống từ khóa SEO',
            'meta_title.required' => 'Không được để trống tiêu đề',
            'meta_description.required' => 'Không được để trống mô tả SEO',
        ];
    }
} 