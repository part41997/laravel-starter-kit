<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class PasswordCheckController extends Controller
{
    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            'password' => [
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'valid' => false,
                'errors' => $validator->errors()
            ]);
        }

        return response()->json([
            'valid' => true,
        ]);
    }
}
