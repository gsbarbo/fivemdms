<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_reports = Report::where('created_at', '>', now()->subMonth())->count();
        $total_users = User::where('created_at', '>', now()->subMonth())->count();
        $adv_patrol_time = "Soon&#8482;";

        return view('portal.staff.dashboard', compact('total_reports', 'total_users', 'adv_patrol_time'));
    }
}
