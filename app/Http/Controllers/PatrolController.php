<?php

namespace App\Http\Controllers;

use App\Models\Patrol;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatrolController extends Controller
{
    public function index()
    {
        $patrols = Patrol::mine()->get();

        return view('portal.patrols.index', compact('patrols'));
    }

    public function store(Request $request)
    {

        Patrol::create([
            'user_steam_hex' => auth()->user()->steam_hex,
            'started_at' => new Carbon(),
        ]);

        return redirect()->route('portal.patrols.index')->with('alert', ['message' => ['Patrol Started.'], 'level' => "success"]);
    }

    public function update(Patrol $patrol)
    {

        $patrol->update(['stopped_at' => new Carbon()]);

        return redirect()->route('portal.patrols.index')->with('alert', ['message' => ['Patrol Ended.'], 'level' => "success"]);
    }

    public function show(Patrol $patrol)
    {
        return view('portal.patrols.show', compact('patrol'));
    }
}
