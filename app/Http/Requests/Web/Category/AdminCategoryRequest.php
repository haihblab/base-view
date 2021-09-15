<?php

namespace App\Http\Requests\Web\Category;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
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
        return [
            'c_name' => 'required|max:190|min:3|unique:categories,c_name,' . $this->id,
            'c_parent_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Không được bỏ trống !',
            'c_name.max' => 'Lớn hơn 190 ký tự !',
            'c_name.min' => 'Nhỏ hơn 3 ký tự !',
            'c_name.unique' => 'Tên đã bị trùng !',
            'c_parent_id.required' => 'Không được bỏ trống !',
            'c_parent_id.numeric' => 'Dữ liệu phải là số !',
        ];
    }
}
