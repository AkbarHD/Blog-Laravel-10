<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email', // kita hapus uniquenya agar jika dia tdk ganti email tdk bermasalaj
            // jika passwordnya diisi maka aktifkan password_konfirmation
            'password' => 'min:8|confirmed|nullable', //boleh kosong tp jika ada maka,
            'password_confirmation' => 'nullable|min:8|required_with:password', //  konfirmasi harus di isi jika passwordnya ada
        ];
    }
}
