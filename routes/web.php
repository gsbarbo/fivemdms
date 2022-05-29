<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\PatrolController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\RosterController;
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
    });
});


require __DIR__ . '/auth.php';
