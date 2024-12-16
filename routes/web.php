<?php

use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\PasswordCheckController;
use App\Http\Controllers\LanguageSwapper;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::guest()) {
        return redirect()->route('login');
    } else {
        return redirect()->route('admin.dashboard.index');
    }
});

Auth::routes([
    'register' => false,
    'verify' => false,
]);

// Password check
Route::post('/password/check', [PasswordCheckController::class, 'index'])->name('check.password');

// locale
Route::get('lang/{locale}', LanguageSwapper::class)->name('lang.swap');

// Admin

Route::as('admin.')
    ->middleware(['auth:web', 'setlocale'])
    ->group(function () {
        // Dashboard
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            Route::get('/card-stats', [DashboardController::class, 'cardStats'])->name('card-stats');
        });

        // Users
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
            Route::get('/show/{user}', [UserController::class, 'show'])->name('show');
            Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
            Route::get('/profile', [UserController::class, 'profile'])->name('profile');
            Route::post('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');
            Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password');
            Route::get('/status/select2', [UserController::class, 'statusSelect2'])->name('status.select2');
        });

        // Roles
        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
            Route::get('/select2', [RoleController::class, 'select2'])->name('select2');
        });

        // CMS: [privancy policy, terms and conditions]
        Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
            Route::get('/', [CmsController::class, 'index'])->name('index');
            Route::get('/{slug}/edit', [CmsController::class, 'edit'])->name('edit');
            Route::put('/{slug}/update', [CmsController::class, 'update'])->name('update');
        });

        // FAQ
        Route::group(['prefix' => 'faqs', 'as' => 'faqs.'], function () {
            Route::get('/faqs', [FaqController::class, 'index'])->name('index');
            Route::get('/faqs/create', [FaqController::class, 'create'])->name('create');
            Route::post('/faqs', [FaqController::class, 'store'])->name('store');
            Route::get('/faqs/{faq}', [FaqController::class, 'show'])->name('show');
            Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('edit');
            Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('update');
            Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('destroy');
            Route::get('/faqs/show/all', [FaqController::class, 'showAll'])->name('show-all');
        });
    });

// Non authenticated routes

// CMS: [privancy policy, terms and conditions]
Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    Route::get('/{slug}/{locale?}', [CmsController::class, 'show'])->name('show');
});