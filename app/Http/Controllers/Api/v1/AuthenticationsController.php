<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Http\Requests\Api\v1\ChangePassword;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthenticationsController extends BaseController
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('authToken')->accessToken;

            return $this->successResponse(
                [
                    'user' => UserResource::make($user),
                    'token' => $token,
                ],
                __('messages.auth.login_success')
            );
        } else {
            return $this->errorResponse(__('messages.auth.login_failed'), 401);
        }
    }

    public function user()
    {
        if (!Auth::guard('api')->check()) {
            return $this->errorResponse(__('messages.auth.unauthorized'), 401);
        }

        return $this->successResponse(
            [
                'user' => UserResource::make(Auth::guard('api')->user()),
            ],
            __('messages.auth.user')
        );
    }

    public function changePassword(ChangePassword $request)
    {
        $validated = $request->validated();

        $user = Auth::guard('api')->user();
        if (!password_verify($request->current_password, $user->password)) {
            return $this->errorResponse(__('messages.auth.invalid_password'), 422);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return $this->successResponse(
            [
                'user' => UserResource::make($user),
            ],
            __('messages.auth.password_changed')
        );
    }
}
