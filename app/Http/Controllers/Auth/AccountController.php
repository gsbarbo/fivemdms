<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AccountCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function create()
    {
        return view('auth.account.create');
    }

    public function store(AccountCreateRequest $request)
    {
        $input = $request->validated();
        unset($input['_token']);

        $input['steam_hex'] = User::dec2hex(session('steam_id'));
        $input['steam_id'] = session('steam_id');
        User::create($input);

        return redirect()->route('logout')->with('success', 'Account Created. Login to contiue.');
    }

    public function show(User $user)
    {
        return view('auth.account.show', compact('user'));
    }
}
