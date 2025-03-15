<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontendRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'name' => 'required|string|max:255',
           'batch' => 'required|string|max:255',
           'permanent_address' => 'required|string|max:255',
           'present_address' => 'required|string|max:255',
           'occupation' => 'required|string|max:255',
           'occupation_sector' => 'required|string|max:255',
           'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'phone' => 'required|string|max:255',
           'whatsapp' => 'required|string|max:255|unique:users',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:6',
           'password_confirmation' => 'required|string|min:6|same:password',
           'designation' => 'required|string|max:255',
           'department' => 'required|string|max:255',
        ];
    }
}
