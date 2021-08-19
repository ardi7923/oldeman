<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daily;
use Illuminate\Http\Request;

class DailyController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date;
        $dailies = Daily::whereDate("time",$request->date)->orderBy("time","desc")->get();
        return view("pages.admin.daily.index",compact("dailies","date"));
    }
}
