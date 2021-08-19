<?php

namespace App\Services;


class OldemanService
{

    public static function get($bb, $bk)
    {
        $bb = self::getBB($bb);
        $bk = self::getBK($bb, $bk);

        return $bb . $bk;
    }

    private static function getBB(int $bb)
    {
        if($bb == 0){
            return "E";
        }
        
        switch ($bb) {
            case $bb > 9:
                return "A";
            case $bb >= 7 && $bb <= 9:
                return "B";
            case $bb == 5 || $bb == 6:
                return "C";
            case $bb == 3 || $bb == 4:
                return "D";
            case $bb < 3:
                return "E";
            default:
                return "Tidak Ditemukan";
        }
    }

    private static function getBK($bb, $bk): string
    {
        if ($bb > 9) {
            return "";
        }

        switch ($bk) {
            case $bk < 2:
                return "1";
            case $bk == 2 || $bk == 3:
                return "2";
            case $bk >= 4 && $bk <= 6:
                return "3";
            case $bk > 6:
                return "4";
            default:
                return "Tidak Ditemukan";
        }
    }
}
