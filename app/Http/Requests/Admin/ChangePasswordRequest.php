<?php

namespace App\Http\Requests\Admin;

use App\Rules\Admin\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
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
        session()->flash('active_tab', '#password-change');
        return [
            'current_password' => [
                'required',
                'string',
                new MatchOldPassword,
            ],
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'password_confirmation' => [
                'required',
                'string',
                'same:password'
            ],
        ];
    }
}
