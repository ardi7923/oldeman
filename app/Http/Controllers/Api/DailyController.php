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

            if ($cekData) {
                Monthly::where("year", $getYear)->update([
                    "jan" => $this->getAverage($getYear, "01"),
                    "feb" => $this->getAverage($getYear, "02"),
                    "mar" => $this->getAverage($getYear, "03"),
                    "apr" => $this->getAverage($getYear, "04"),
                    "may" => $this->getAverage($getYear, "05"),
                    "jun" => $this->getAverage($getYear, "06"),
                    "jul" => $this->getAverage($getYear, "07"),
                    "ags" => $this->getAverage($getYear, "08"),
                    "sep" => $this->getAverage($getYear, "09"),
                    "oct" => $this->getAverage($getYear, "10"),
                    "nov" => $this->getAverage($getYear, "11"),
                    "des" => $this->getAverage($getYear, "12"),
                ]);
                $this->updateMonthType($getYear);
            } else {
                Monthly::create([
                    "year" => $getYear,
                    "jan" => $this->getAverage($getYear, "01"),
                    "feb" => $this->getAverage($getYear, "02"),
                    "mar" => $this->getAverage($getYear, "03"),
                    "apr" => $this->getAverage($getYear, "04"),
                    "may" => $this->getAverage($getYear, "05"),
                    "jun" => $this->getAverage($getYear, "06"),
                    "jul" => $this->getAverage($getYear, "07"),
                    "ags" => $this->getAverage($getYear, "08"),
                    "sep" => $this->getAverage($getYear, "09"),
                    "oct" => $this->getAverage($getYear, "10"),
                    "nov" => $this->getAverage($getYear, "11"),
                    "des" => $this->getAverage($getYear, "12"),
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
        $count_day = Carbon::parse($year."-".$month."-01");

        $month = 0;
        for($i=1; $i <= $count_day; $i++)
        {
           $month += Daily::whereDate("time",$year."-".$month.($i > 9) ? $i : "0".$i)->orderBy("time","desc")->first()->rainfall;
        }

        return $month;
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
