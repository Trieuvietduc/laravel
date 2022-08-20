<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            "name" => "required",
            "don_gia" => "required|numeric|integer",
            "khuyen_mai" => "nullable|numeric|integer",
            "so_luong" => "required|numeric|integer",
            
            "mo_ta" => "required|max:255|min:100",
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'don_gia.required' => 'Giá không được để trống',
            'don_gia.numeric' => 'giá bắt buộc phải là số',
            'don_gia.integer' => 'giá bắt buộc phải là số',
            'khuyen_mai.nullable' => '',
            'khuyen_mai.integer' => 'giá khuyến mại bắt buộc buộc phải là số',
            'khuyen_mai.integer' => 'giá khuyến mại bắt buộc buộc phải là số',
            'so_luong.required' => 'Số lượng phải là số',
            'so_luong.integer' => 'Số lượng phải là số',
           
            // 'danh_muc.required' => 'Danh mục không được để trống',
            // 'kich_thuoc.required' => 'Kích thước không được để trống',
            'mo_ta.required' => 'Mô tả không được để trống',
            'mo_ta.max' => 'Mô tả không được quá 255 ký tự',
            'mo_ta.min' => 'Mô tả không được nhỏ hơn 100 ký tự',
        ];
    }
}
