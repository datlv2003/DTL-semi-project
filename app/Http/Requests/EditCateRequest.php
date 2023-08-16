<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules():array
    // {
    //     return [
    //         //
    //         'name'=>'unique:vp_categories,cate_name'.$this->segment(4).',cate_id'
    //     ];
    // }
    {
        return [
            'name' => 'unique:vp_categories,cate_name,' . $this->segment(4) . ',cate_id'
        ];
    }
    public function messages()
    {
        return [
            'name.unique'=>'Tên Danh Mục Đã Bị Trùng !'
        ];
    }
}
