<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daily;
use App\Models\Monthly;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dailies = Daily::latest("id")->limit(5)->get();
        $statistik_dailies = Daily::whereDate("time", now()->format("Y-m-d"))->orderBy("time", "desc")->get();
        $statistik_monthlies = Monthly::where('year',now()->format("Y"))->first();

        return view('pages.admin.dashboard.index', compact("dailies", "statistik_dailies","statistik_monthlies"));
    }
}
