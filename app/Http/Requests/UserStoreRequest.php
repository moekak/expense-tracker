<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8'],
            'user_id' => ['required', 'string', 'max:20', 'unique:users'],
            "image" => [
                "nullable",
                "file",
                "image",
                "max: 2000",
                "mimes:jpeg,jpg,png", // 形式はjpegかpng
            ]
            
        ];
    }
}
