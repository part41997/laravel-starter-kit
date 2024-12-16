<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ProfileUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;

use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    use ApiResponser;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth:api');
        $this->userService = $userService;
    }

    public function index()
    {
        $users = User::all();

        return $this->successResponse(
            UserResource::collection($users),
            __('messages.fetched', ['item' => 'Users'])
        );
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {
        $user = $this->userService->update($request->all(), Auth::guard('api')->id());
        if ($user) {
            return $this->successResponse(
                UserResource::make($user),
                __('messages.updated', ['item' => 'Profile'])
            );
        } else {
            return $this->errorResponse(__('messages.something_went_wrong'));
        }
    }
}
