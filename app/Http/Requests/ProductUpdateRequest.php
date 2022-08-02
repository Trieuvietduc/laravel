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
            "don_gia" => "numeric|between:0,99|regex:/^\d+(,\d{1,2})?$/"
            
        ];
    }
    public function messages()
    {
        return [
            'don_gia.numeric' => 'giá bắt buộc phải là số',
            'don_gia.between' => 'giá không đúng định dạng',
            'don_gia.regex' => 'giá không đúng định dạng',
        ];
    }
}
