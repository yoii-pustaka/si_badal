<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // pastikan hanya user login yang akses
    }

    public function rules(): array
    {
        return [
            'full_name'       => ['required', 'string', 'max:255'],
            'phone'           => ['nullable', 'string', 'max:20'],
            'address'         => ['nullable', 'string', 'max:500'],
            'passport_number' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Nama lengkap wajib diisi.',
            'full_name.max'      => 'Nama lengkap maksimal 255 karakter.',
            'phone.max'          => 'Nomor telepon maksimal 20 karakter.',
            'address.max'        => 'Alamat maksimal 500 karakter.',
            'passport_number.max'=> 'Nomor paspor maksimal 100 karakter.',
        ];
    }
}
