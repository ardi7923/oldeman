<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DailyRequest;
use App\Models\Daily;
use App\Models\Monthly;
use Carbon\Carbon;

class DailyController extends Controller
{
    public function post(DailyRequest $request)
    {
        try {

            Daily::create([
                "time"     => $request->time,
                "rainfall" => $request->rainfall
            ]);

            $getYear = Carbon::parse($request->time)->format("Y");
            $cekData = Monthly::where("year", $getYear)->first();
            $getMonth = Carbon::parse($request->time)->format("m");

            if ($cekData) {
                Monthly::where("year", $getYear)->update([
                    month_name($getMonth) => $this->getAverage($getYear, $getMonth),
                ]);
                $this->updateMonthType($getYear);
            } else {
                Monthly::create([
                    "year" => $getYear,
                    month_name($getMonth) => $this->getAverage($getYear, $getMonth),
                ]);
                $this->updateMonthType($getYear);
            }
            return response()->json(["message" => "Data Berhasil Dikirim"], 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    private function getAverage($year, $month)
    {
        
        $count_day = Carbon::parse($year."-".$month."-01")->daysInMonth;
        $monthVal = 0; 
        for($i=1; $i <= $count_day; $i++)
        {
            $monthVal += Daily::whereDate("time",Carbon::parse($year."-".$month."-". $i )->format("Y-m-d"))->orderBy("time","desc")->first()->rainfall ?? 0;
        }

        return $monthVal;
    }

    private function updateMonthType($year)
    {
        $bk = 0;
        $bb = 0;

        $rainfall = Monthly::where("year",$year)->first();

        $month = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "ags", "sep", "oct", "nov", "des"];

        foreach ($month as $m) {
            if ($rainfall->$m > 200) {
                $bb++;
            } else if ($rainfall->$m < 100) {
                $bk++;
            }
        }



        $rainfall->update([
            "bk" => $bk,
            "bb" => $bb
        ]);
    }
}
