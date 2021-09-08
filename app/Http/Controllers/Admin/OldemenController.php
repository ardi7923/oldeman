<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monthly;
use App\Models\Prediction;
use App\Services\OldemanService;
use Illuminate\Http\Request;
use Prophecy\Exception\Prediction\PredictionException;

class OldemenController extends Controller
{
    public function index()
    {

        $monthlies = Monthly::orderBy("year")->get();

        foreach ($monthlies as $m) {
            $m->oldeman = OldemanService::get($m->bb, $m->bk);
        }

        $predictions = Prediction::all();

        foreach ($predictions as $p) {
            $p->oldeman = OldemanService::get($p->bb, $p->bk);
        }

        return view("pages.admin.oldemen.index", compact("monthlies", "predictions"));
    }

    public function predictionForm()
    {
        return renderToJson("pages.admin.oldemen.prediction");
    }

    public function deletePredictionForm()
    {
        $predictions = Prediction::all();
        return renderToJson("pages.admin.oldemen.delete-prediction",compact("predictions"));
    }

    public function deletePrediction(Request $request)
    {
        try {
            Prediction::where("year",$request->year)->delete();
            return back();
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function prediction(Request $request)
    {
        $year = $request->year;
        $prediction = Prediction::where("year", $request->year)->count();
        if ($prediction) {
            // dd($this->getQueryMonth($year,"des"));
            Prediction::where("year",$year)->update([
                "year" => $request->year,
                "jan" => $this->getPrediction($year, "jan"),
                "feb" => $this->getPrediction($year, "feb"),
                "mar" => $this->getPrediction($year, "mar"),
                "apr" => $this->getPrediction($year, "apr"),
                "may" => $this->getPrediction($year, "may"),
                "jun" => $this->getPrediction($year, "jun"),
                "jul" => $this->getPrediction($year, "jul"),
                "ags" => $this->getPrediction($year, "ags"),
                "sep" => $this->getPrediction($year, "sep"),
                "oct" => $this->getPrediction($year, "oct"),
                "nov" => $this->getPrediction($year, "nov"),
                "des" => $this->getPrediction($year, "des"),
            ]);
            $this->updateMonthTypePrediction($request->year);
            return back();
        } else {
            // dd($this->cekNull($this->getMonthPrediction($year, "des"), $year));
            Prediction::create([
                "year" => $request->year,
                "jan" => $this->getPrediction($year, "jan"),
                "feb" => $this->getPrediction($year, "feb"),
                "mar" => $this->getPrediction($year, "mar"),
                "apr" => $this->getPrediction($year, "apr"),
                "may" => $this->getPrediction($year, "may"),
                "jun" => $this->getPrediction($year, "jun"),
                "jul" => $this->getPrediction($year, "jul"),
                "ags" => $this->getPrediction($year, "ags"),
                "sep" => $this->getPrediction($year, "sep"),
                "oct" => $this->getPrediction($year, "oct"),
                "nov" => $this->getPrediction($year, "nov"),
                "des" => $this->getPrediction($year, "des"),
            ]);

            $this->updateMonthTypePrediction($request->year);
            return back();
        }
    }

    public function getPrediction($year, $month)
    {
        return array_sum($this->cekNull($this->getMonthPrediction($year, $month), $year))/3;
    }

    public function cekNull($array, $year)
    {
        $tes = [];

        foreach ($array as $key => $a) {
            if ($a == 0) {
                $tes[$key] = $this->getPrediction($year, $key);
            } else {
                $tes[$key] = $a;
            }
        }
        return $tes;
    }


    public function getMonthPrediction($year, $month)
    {

        switch ($month) {
            case "jan":
                $month3 = $this->getQueryMonth($year - 1, "oct");
                $month2 = $this->getQueryMonth($year - 1, "nov");
                $month1 = $this->getQueryMonth($year - 1, "des");
                return ["oct" => $month3, "nov" => $month2, "des" => $month1];
                break;
            case "feb":
                $month3 = $this->getQueryMonth($year - 1, "nov");
                $month2 = $this->getQueryMonth($year - 1, "des");
                $month1 = $this->getQueryMonth($year, "jan");
                return ["nov" => $month3, "des" => $month2, "jan" => $month1];
                break;
            case "mar":
                $month3 = $this->getQueryMonth($year - 1, "des");
                $month2 = $this->getQueryMonth($year, "jan");
                $month1 = $this->getQueryMonth($year, "feb");
                return ["des" => $month3, "jan" => $month2, "feb" => $month1];
                break;
            case "apr":
                $month3 = $this->getQueryMonth($year, "jan");
                $month2 = $this->getQueryMonth($year, "feb");
                $month1 = $this->getQueryMonth($year, "mar");
                return ["jan" => $month3, "feb" => $month2, "mar" => $month1];
                break;
            case "may":
                $month3 = $this->getQueryMonth($year, "feb");
                $month2 = $this->getQueryMonth($year, "mar");
                $month1 = $this->getQueryMonth($year, "apr");
                return ["feb" => $month3, "mar" => $month2, "apr" => $month1];
                break;
            case "jun":
                $month3 = $this->getQueryMonth($year, "mar");
                $month2 = $this->getQueryMonth($year, "apr");
                $month1 = $this->getQueryMonth($year, "may");
                return ["mar" => $month3, "apr" => $month2, "may" => $month1];
                break;
            case "jul":
                $month3 = $this->getQueryMonth($year, "apr");
                $month2 = $this->getQueryMonth($year, "may");
                $month1 = $this->getQueryMonth($year, "jun");
                return ["apr" => $month3, "may" => $month2, "jun" => $month1];
                break;
            case "ags":
                $month3 = $this->getQueryMonth($year, "may");
                $month2 = $this->getQueryMonth($year, "jun");
                $month1 = $this->getQueryMonth($year, "jul");
                return ["may" => $month3, "jun" => $month2, "jul" => $month1];
                break;
            case "sep":
                $month3 = $this->getQueryMonth($year, "jun");
                $month2 = $this->getQueryMonth($year, "jul");
                $month1 = $this->getQueryMonth($year, "ags");
                return ["jun" => $month3, "jul" => $month2, "ags" => $month1];
                break;
            case "oct":
                $month3 = $this->getQueryMonth($year, "jul");
                $month2 = $this->getQueryMonth($year, "ags");
                $month1 = $this->getQueryMonth($year, "sep");
                return ["jul" => $month3, "ags" => $month2, "sep" => $month1];
                break;
            case "nov":
                $month3 = $this->getQueryMonth($year, "ags");
                $month2 = $this->getQueryMonth($year, "sep");
                $month1 = $this->getQueryMonth($year, "oct");
                return ["ags" => $month3, "sep" => $month2, "oct" => $month1];
                break;
            case "des":
                $month3 = $this->getQueryMonth($year, "sep");
                $month2 = $this->getQueryMonth($year, "oct");
                $month1 = $this->getQueryMonth($year, "nov");
                return ["sep" => $month3, "oct" => $month2, "nov" => $month1];
                break;
        }
    }

    public function getQueryMonth($year, $month)
    {
        $prediction = Prediction::where("year", $year)->first() ?? null;
        $rainfall   = Monthly::where("year", $year)->first() ?? null;
        
        if($rainfall){

                return $rainfall->$month;
            
        }else{
  
            return $prediction->$month ?? 0;
        }
    }

    private function updateMonthTypePrediction($year)
    {
        $bk = 0;
        $bb = 0;

        $rainfall = Prediction::where("year", $year)->first();

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
