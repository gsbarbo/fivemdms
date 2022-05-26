<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LinkDiscordController;
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

Route::middleware('auth')->group(function () {
    Route::get('login/discord', function () {
        return Socialite::driver('discord')->redirect();
    })->name('auth.discord');

    Route::get('login/discord/handle', [LinkDiscordController::class, 'discord']);

    Route::view('account/link/discord', 'auth.account.link-discord')->name('account.link.discord');
});
