<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\PatrolController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\RosterController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'pages.home')->name('home');

Route::group(['middleware' => ['auth', 'discord_link_check']], function () {


    Route::get('/account/show/{user}', [AccountController::class, 'show'])->name('auth.account.show');

    Route::group(['middleware' => 'must_apply'], function () {
        Route::get('/application/{applicationForm}/create', [ApplicationController::class, 'create'])->name('apply.application.create');
        Route::post('/application/{applicationForm}', [ApplicationController::class, 'store'])->name('apply.application.store');
    });

    Route::prefix('portal')->name('portal.')->middleware(['auth', 'discord_link_check'])->group(function () {
        Route::get('/', [PortalController::class, 'index'])->name('index');
        Route::get('/roster', [RosterController::class, 'index'])->name('roster.index');


        Route::get('/patrols', [PatrolController::class, 'index'])->name('patrols.index');
        Route::post('/patrols', [PatrolController::class, 'store'])->name('patrols.store');
        Route::get('/patrols/{patrol}', [PatrolController::class, 'show'])->name('patrols.show');
        Route::put('/patrols/{patrol}', [PatrolController::class, 'update'])->name('patrols.update');

        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/{report_form}/create', [ReportController::class, 'create'])->name('reports.create');
        Route::post('/reports/{report_form}', [ReportController::class, 'store'])->name('reports.store');
        Route::get('/reports/{report_form}/{report}', [ReportController::class, 'show'])->name('reports.show');

        Route::prefix('staff')->name('staff.')->middleware(['auth', 'can:staff_access'])->group(function () {
            Route::get('dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
        });


        Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:admin_access'])->group(function () {
            Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

            Route::get('permissions/restore/{permission}', [PermissionController::class, 'restore'])->name('permissions.restore');
            Route::resource('permissions', PermissionController::class, ['except' => ['show', 'update', 'edit']]);

            Route::resource('roles', RoleController::class, ['except' => ['show']]);
        });
    });
});


require __DIR__ . '/auth.php';
