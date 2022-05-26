<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget(['steam_hex', 'steam_id']);

        if (session('success')) {
            return redirect()->route('home')->with('success', session('success'));
        }

        return redirect()->route('home')->with('alert', ['message' => ['Logged Out.'], 'level' => "error"]);
    }
}
