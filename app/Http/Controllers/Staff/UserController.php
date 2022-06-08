<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\UserStatusRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('account_status', 'asc')->get();

        return view('portal.staff.users.index', compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $account_statuses = DB::table('account_statuses')->get(['id', 'name']);
        return view('portal.staff.users.show', compact('user', 'account_statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    }


    public function update_status(UserStatusRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('portal.staff.users.show', $user->steam_hex)->with('alert', ['message' => ['User Updated.'], 'level' => "success"]);
    }
}
