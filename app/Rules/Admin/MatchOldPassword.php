<?php

namespace App\Rules\Admin;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Hash::check($value, Auth::user()->password)) {
            $fail(__('validation.incorrect_old_password'));
        }
    }
}
