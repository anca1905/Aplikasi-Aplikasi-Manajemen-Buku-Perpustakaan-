<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'foto'      => 'nullable|mimes:png,jpg|max:2048',
            'nama'      => 'required',
            'email'     => 'required|email',
            'password'  => 'nullable',
        ];
    }

    public function withValidator($validator)
    {
        // Kalau method POST (store), password wajib diisi
        if ($this->isMethod('post')) {
            $validator->sometimes('password', 'required', function ($data) {
                return true; // di POST selalu required
            });

            $validator->sometimes('foto', 'required|mimes:png,jpg|max:2048', function($data){
                return true;
            });
        }
    }
}
