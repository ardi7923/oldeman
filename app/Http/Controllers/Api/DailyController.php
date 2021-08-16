<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DailyRequest;
use App\Models\Daily;

class DailyController extends Controller
{
    public function post(DailyRequest $request)
    {
        try {
            
            Daily::create([
                    "time" => $request->time,
                    "rainfall" => $request->rainfall
            ]);

            return response()->json(["message" => "Data Berhasil Dikirim"],200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
