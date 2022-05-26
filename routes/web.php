<?php

use App\Http\Controllers\Auth\AccountController;
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

    Route::prefix('portal')->name('portal.')->middleware(['auth'])->group(function () {
        Route::get('/', [PortalController::class, 'index'])->name('index');
    });
});


require __DIR__ . '/auth.php';
