<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monthly;

class MonthlyController extends Controller
{
    public function index()
    {
        $monthlies = Monthly::orderBy("year","desc")->get();
        return view("pages.admin.monthly.index",compact("monthlies"));
    }
}
