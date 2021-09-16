<?php

namespace App\Services;

use App\Models\Rainfall;
use DB;

class RainfallService {

    public function save($request)
    {
        DB::transaction(function () use ($request) {
           $rainfall = Rainfall::create($request->all());
           $this->updateMonthType($rainfall->id);
        });
    }

    public function update($request,$params)
    {
        DB::transaction(function () use ($request,$params) {
           $rainfall = Rainfall::where("id",$params)->update($request->except(["_token","_method"]));
           $this->updateMonthType($params);
        });
    }


    private function updateMonthType($id){
        $bk = 0;
        $bb = 0;

        $rainfall = Rainfall::findOrFail($id);
        
        $month = ["jan","feb","mar","apr","may","jun","jul","ags","sep","oct","nov","des"];

        foreach($month as $m){
            if($rainfall->$m > 200){
                $bb++;
            }else if($rainfall->$m < 100){
                $bk++;
            }
        }
        

        
        Rainfall::findOrFail($id)->update([
            "bk" => $bk,
            "bb" => $bb
        ]);
    }
}