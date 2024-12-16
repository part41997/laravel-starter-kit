<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = __('app.menu.dashboard');
        return view('admin.dashboards.index', compact('pageTitle'));
    }

    public function cardStats(Request $request)
    {
        $dateRange = $request->dateRange;

        $startDate = $endDate = NULL;
        if ($dateRange) {
            $dateRange = explode(' - ', $dateRange);
            $startDate = Carbon::parse($dateRange[0])->startOfDay();
            $endDate = Carbon::parse($dateRange[1])->endOfDay();
        }

        $users = User::query()
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            });

        $totalUsers = $users->clone()->get()->count();
        $totalUsersActive = $users
            ->clone()
            ->where('status', UserStatus::ACTIVE->value)
            ->get()
            ->count();
        $totalUsersInactive = $users
            ->clone()
            ->where('status', UserStatus::INACTIVE->value)
            ->get()
            ->count();

        return response()->json([
            'totalUsers' => $totalUsers,
            'totalUsersActive' => $totalUsersActive,
            'totalUsersInactive' => $totalUsersInactive,
        ]);
    }
}
