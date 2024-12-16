<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\UserCreateEditRequest;
use App\Notifications\Admin\UserCreated;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    protected $roleService, $userService;

    public function __construct(RoleService $roleService, UserService $userService)
    {
        $this->roleService = $roleService;
        $this->userService = $userService;
    }

    public function index(UsersDataTable $dataTable)
    {
        $pageTitle = __('app.menu.users');
        return $dataTable->render('admin.users.index', compact('pageTitle'));
    }

    public function create()
    {
        $pageTitle = __('app.menu.add_user');
        $user = new User();
        $roles = $this->roleService->getAll($except = ['Super Admin']);
        return view('admin.users.create-edit', compact('pageTitle', 'user', 'roles'));
    }

    public function store(UserCreateEditRequest $request)
    {
        $request->validated();
        $user = $this->userService->save($request->all());
        if ($user) {
            return redirect()->route('admin.users.index')->withSuccess(__('messages.created', ['item' => 'User']));
        } else {
            return redirect()->route('admin.users.index')->withError(__('messages.something_went_wrong'));
        }
    }

    public function edit($id)
    {
        $pageTitle = __('app.menu.edit_user');
        $user = $this->userService->getById($id);
        if (empty($user)) {
            return redirect()->route('admin.users.index')->withError(__('messages.not_found' , ['item' => 'User']));
        }
        $roles = $this->roleService->getAll($except = ['Super Admin']);
        return view('admin.users.create-edit', compact('pageTitle', 'user', 'roles'));
    }

    public function update(UserCreateEditRequest $request, $id)
    {
        $request->validated();
        $user = $this->userService->update($request->all(), $id);
        if ($user) {
            return redirect()->route('admin.users.index')->withSuccess(__('messages.updated', ['item' => 'User']));
        } else {
            return redirect()->route('admin.users.index')->withError(__('messages.something_went_wrong'));
        }
    }

    public function destroy($id)
    {
        $user = $this->userService->deleteById($id);
        if ($user) {
            return redirect()->route('admin.users.index')->withSuccess(__('messages.deleted', ['item' => 'User']));
        } else {
            return redirect()->route('admin.users.index')->withError(__('messages.something_went_wrong'));
        }
    }

    public function show($id)
    {
        $pageTitle = __('app.menu.view_user');
        $user = $this->userService->getById($id);
        $roles = $this->roleService->getAll($except = ['Super Admin']);
        return view('admin.users.create-edit', compact('pageTitle', 'user', 'roles'));
    }

    public function profile()
    {
        $pageTitle = __('app.menu.profile');
        $user = Auth::user();
        return view('admin.users.profile', compact('pageTitle', 'user'));
    }

    public function profileUpdate(UserCreateEditRequest $request)
    {
        $request->validated();
        $user = $this->userService->update($request->all(), Auth::id());

        if ($request->ajax()) {
            return response()->json([
                'message' => __('messages.updated', ['item' => 'Profile']),
            ], 200);
        } else {
            if ($user) {
                return redirect()->route('admin.users.profile')->withSuccess(__('messages.updated', ['item' => 'Profile']));
            } else {
                return redirect()->route('admin.users.profile')->withError(__('messages.something_went_wrong'));
            }
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $request->validated();
        $user = $this->userService->changePassword($request->password, Auth::id());
        if ($user) {
            return redirect()->route('admin.users.profile')->withSuccess(__('messages.updated', ['item' => 'Password']));
        } else {
            return redirect()->route('admin.users.profile')->withError(__('messages.something_went_wrong'));
        }
    }

    public function statusSelect2(Request $request)
    {
        $search = $request->q;
        $response = $this->userService->statusSelect2($search);
        return response()->json($response);
    }
}
