<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
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
        $user = Auth::id();
        return [
            'first_name' => [
                'required',
                'max:255',
                'min:3',
                'string',
            ],
            'middle_name' => [
                'nullable',
                'max:255',
                'min:3',
                'string',
            ],
            'last_name' => [
                'required',
                'max:255',
                'min:3',
                'string',
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
        ];
    }
}
