<?php

namespace App\Http\Requests;


use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->register == 1) {
            return [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:7|max:10'
            ];
        }
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.unique' => 'email này đã tồn tại',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            
            'password.required' => 'Mật khẩu không đucợ để trống',
            'password.min' => 'Mật khẩu từ 6 đến 10 ký tự',
            'password.max' => 'Mật khẩu từ 6 đến 10 ký tự',
        ];
    }
}
