<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Patrol;
use Illuminate\Http\Request;

class PatrolController extends Controller
{
    public function show(Patrol $patrol)
    {
        return view('portal.staff.patrols.show', compact('patrol'));
    }
}
