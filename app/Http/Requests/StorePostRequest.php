<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|min:10',                   // kiểm tra name mình gửi lên có trống hay không
            // 'email' => 'required|email|unique:users',
            'short_content' => 'required',
            'thumbnail' => 'required',
            'content'=> 'required',
            'status'=> 'required',
            'meta_keyword'=> 'required',
            'meta_title'=> 'required',
            'meta_description'=> 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Tên phải có ít nhất 10 ký tự',            
            'short_content.required' => 'Vui lòng nhập nội dung ngắn',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
            'content.required' => 'Vui lòng nhập nội dung bài viết',
            'status.required' => 'Vui lòng chọn trạng thái bài viết',
            'meta_keyword.required' => 'Vui lòng từ khóa SEO',
            'meta_title.required' => 'Vui lòng nhập tiêu đề SEO',
            'meta_description.required' => 'Vui lòng nhập mô tả SEO'
        ];
    }
}