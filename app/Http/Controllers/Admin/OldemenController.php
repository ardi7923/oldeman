<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monthly;
use App\Models\Prediction;
use App\Services\OldemanService;
use Illuminate\Http\Request;
use App\Services\PredictionService;

class OldemenController extends Controller
{
    private $jan,
        $feb,
        $mar,
        $apr,
        $may,
        $jun,
        $jul,
        $ags,
        $sep,
        $oct,
        $nov,
        $des;

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
        return renderToJson("pages.admin.oldemen.delete-prediction", compact("predictions"));
    }

    public function deletePrediction(Request $request)
    {
        try {
            Prediction::where("year", $request->year)->delete();
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

            $arr = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "ags", "sep", "oct", "nov", "des"];
            foreach ($arr as $a) {
                $this->$a = $this->getAverage($year, $a);
            }

            Prediction::where("year", $year)->update([
                "year" => $request->year,
                "jan" => $this->jan,
                "feb" => $this->feb,
                "mar" => $this->mar,
                "apr" => $this->apr,
                "may" => $this->may,
                "jun" => $this->jun,
                "jul" => $this->jul,
                "ags" => $this->ags,
                "sep" => $this->sep,
                "oct" => $this->oct,
                "nov" => $this->nov,
                "des" => $this->des,
            ]);
            $this->updateMonthTypePrediction($request->year);
            return back();
        } else {
            $arr = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "ags", "sep", "oct", "nov", "des"];
            foreach ($arr as $a) {
                $this->$a = $this->getAverage($year, $a);
            }

            Prediction::create([
                "year" => $request->year,
                "jan" => $this->jan,
                "feb" => $this->feb,
                "mar" => $this->mar,
                "apr" => $this->apr,
                "may" => $this->may,
                "jun" => $this->jun,
                "jul" => $this->jul,
                "ags" => $this->ags,
                "sep" => $this->sep,
                "oct" => $this->oct,
                "nov" => $this->nov,
                "des" => $this->des,
            ]);

            $this->updateMonthTypePrediction($request->year);
            return back();
        }
    }

    public function getAverage($year, $month)
    {
        return array_sum($this->getMonthPrediction($year, $month)) / 3;
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
                $month1 = $this->getQueryMonth($year, "jan") ?? $this->jan;
                return ["nov" => $month3, "des" => $month2, "jan" => $month1];
                break;
            case "mar":
                $month3 = $this->getQueryMonth($year - 1, "des");
                $month2 = $this->getQueryMonth($year, "jan") ?? $this->jan;
                $month1 = $this->getQueryMonth($year, "feb") ?? $this->feb;
                return ["des" => $month3, "jan" => $month2, "feb" => $month1];
                break;
            case "apr":
                $month3 = $this->getQueryMonth($year, "jan") ?? $this->jan;
                $month2 = $this->getQueryMonth($year, "feb") ?? $this->feb;
                $month1 = $this->getQueryMonth($year, "mar") ?? $this->mar;
                return ["jan" => $month3, "feb" => $month2, "mar" => $month1];
                break;
            case "may":
                $month3 = $this->getQueryMonth($year, "feb") ?? $this->feb;
                $month2 = $this->getQueryMonth($year, "mar") ?? $this->mar;
                $month1 = $this->getQueryMonth($year, "apr") ?? $this->apr;
                return ["feb" => $month3, "mar" => $month2, "apr" => $month1];
                break;
            case "jun":
                $month3 = $this->getQueryMonth($year, "mar") ?? $this->mar;
                $month2 = $this->getQueryMonth($year, "apr") ?? $this->apr;
                $month1 = $this->getQueryMonth($year, "may") ?? $this->may;
                return ["mar" => $month3, "apr" => $month2, "may" => $month1];
                break;
            case "jul":
                $month3 = $this->getQueryMonth($year, "apr") ?? $this->apr;
                $month2 = $this->getQueryMonth($year, "may") ?? $this->may;
                $month1 = $this->getQueryMonth($year, "jun") ?? $this->jun;
                return ["apr" => $month3, "may" => $month2, "jun" => $month1];
                break;
            case "ags":
                $month3 = $this->getQueryMonth($year, "may") ?? $this->may;
                $month2 = $this->getQueryMonth($year, "jun") ?? $this->jun;
                $month1 = $this->getQueryMonth($year, "jul") ?? $this->jul;
                return ["may" => $month3, "jun" => $month2, "jul" => $month1];
                break;
            case "sep":
                $month3 = $this->getQueryMonth($year, "jun") ?? $this->jun;
                $month2 = $this->getQueryMonth($year, "jul") ?? $this->jul;
                $month1 = $this->getQueryMonth($year, "ags") ?? $this->ags;
                return ["jun" => $month3, "jul" => $month2, "ags" => $month1];
                break;
            case "oct":
                $month3 = $this->getQueryMonth($year, "jul") ?? $this->jul;
                $month2 = $this->getQueryMonth($year, "ags") ?? $this->ags;
                $month1 = $this->getQueryMonth($year, "sep") ?? $this->sep;
                return ["jul" => $month3, "ags" => $month2, "sep" => $month1];
                break;
            case "nov":
                $month3 = $this->getQueryMonth($year, "ags") ?? $this->ags;
                $month2 = $this->getQueryMonth($year, "sep") ?? $this->sep;
                $month1 = $this->getQueryMonth($year, "oct") ?? $this->oct;
                return ["ags" => $month3, "sep" => $month2, "oct" => $month1];
                break;
            case "des":
                $month3 = $this->getQueryMonth($year, "sep") ?? $this->sep;
                $month2 = $this->getQueryMonth($year, "oct") ?? $this->oct;
                $month1 = $this->getQueryMonth($year, "nov") ?? $this->nov;
                return ["sep" => $month3, "oct" => $month2, "nov" => $month1];
                break;
        }
    }



    public function getQueryMonth($year, $month)
    {
        $prediction = Prediction::where("year", $year)->first() ?? null;
        $rainfall   = Monthly::where("year", $year)->first() ?? null;

        $monthRequest = $year . '-' . month_number($month);



        if ($rainfall != null) {

            if ($monthRequest >= now()->format("Y-m")) {
                return $prediction->$month ?? null;
            } else {
                return $rainfall->$month;
            }

        } else if ($prediction != null) {
            dd("prediction");
            return $prediction->$month;
        } else {
            return null;
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
