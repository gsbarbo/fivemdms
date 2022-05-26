<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SteamLoginController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('login/steam', function () {
    return Socialite::driver('steam')->redirect();
})->name('auth.steam');

Route::get('/login/steam/handle', [SteamLoginController::class, 'login']);

Route::group(['middleware' => 'new_account_check'], function () {
    Route::get('/account/create', [AccountController::class, 'create'])->name('auth.account.create');
    Route::post('/account', [AccountController::class, 'store'])->name('auth.account.store');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
