<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function select2(Request $request)
    {
        $search = $request->q;
        $except = ['Super Admin'];

        $roles = $this->roleService->select2($search, $except);

        return response()->json($roles);
    }
}
