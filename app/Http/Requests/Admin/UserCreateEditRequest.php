<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateEditRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:255',
                'min:3',
                'unique:users,email,' . $this->user,
            ],
            'role' => [
                'required',
                'exists:roles,id',
            ],
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'first_name' => __('app.user.first_name'),
            'middle_name' => __('app.user.middle_name'),
            'last_name' => __('app.user.last_name'),
            'email' => __('app.user.email'),
            'role' => __('app.user.role'),
        ];
    }
}
