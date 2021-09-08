<?php

namespace App\Services;

use App\Models\Monthly;
use App\Models\Prediction;

class PredictionService{

    private $year,$month;

    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    public function setMonth($month)
    {
        $this->month = $month;
        return $this;
    }

    public function get()
    {
        dd($this->getQueryMonth($this->year, "sep"));
        return array_sum($this->getMonthPrediction($this->year, $this->month)) / 3;  
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
    private function getQueryMonth($year, $month)
    {
        $prediction = Prediction::where("year", $year)->first() ?? null;
        $rainfall   = Monthly::where("year", $year)->first() ?? null;

        $monthRequest = $year . '-'.month_number($month);


        if ($monthRequest >= now()->format("Y-m")) {
            return 0;
        } else {
            if ($rainfall) {
                return $rainfall->$month;
            } else if ($prediction) {
                return $prediction->$month;
            } else {
                return 0;
            }
        }
    }
}