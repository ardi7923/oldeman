<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monthly;
use App\Services\OldemanService;
use Illuminate\Http\Request;

class OldemenController extends Controller
{
    public function index(){
        
        $monthlies = Monthly::orderBy("year")->get();

        foreach($monthlies as $m){
            $m->oldeman = OldemanService::get($m->bb,$m->bk);
        }

        return view("pages.admin.oldemen.index",compact("monthlies"));
    }
}
