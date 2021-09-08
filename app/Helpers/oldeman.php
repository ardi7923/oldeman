<?php

if (!function_exists('description_oldeman')) {

    function description_oldeman($value)
    {
        if (substr($value, 0, 1) == "A") {
            return " Sesuai untuk padi terus menerus tetapi produksi kurang karena pada umumnya intensitas radiasi rendah sepanjang tahun";
        } else if ($value == "B1") {
            return "Sesuai  untuk  padi  terus  menerus  dengan  perencanaan  awal  musim  tanam  yang  baik. Produksi tinggi bila panen musim kemarau";
        } else if ($value == "B2" || $value == "B3") {
            return "Dapat tanam padi dua kali setahun dengan varietas umur pendek dan musim kering yang pendek cukup untuk tanaman palawija";
        } else if ($value == "C1") {
            return "Tanam padi dapat sekali dan palawija dua kali setahun";
        } else if ($value == "C2" || $value == "C3" || $value == "C4") {
            return "Setahun hanya dapat satu  kali tanam padi dan penanaman  palawija kedua harus berhati-hati jangan jatuh pada bulan kering";
        } else if ($value == "D1") {
            return "Tanam padi umur pendek satu kali dan biasanya produksi bias tinggi karena kerapatan fluks radiasi tinggi. Waktu tanam palawija cukup";
        } else if ($value == "D2" || $value == "D3" || $value == "D4") {
            return "Hanya  mungkin satu  kali  padi  atau satu kali  palawija setahun,  tergantung  pada  adanya persediaan air irigasi";
        } else if (substr($value, 0, 1) == "E") {
            return "Daerah  ini  umumnya  terlalu  kering,  mungkin  hanya  dapat  satu  kali  palawija,  itupun tergantung adanya hujan";
        } else {
            return "Keterangan Tidak Ditemukan";
        }
    }
}


if (!function_exists('month_number')) {

    function month_number($value)
    {
        switch ($value) {
            case "jan":
                return "01";
                break;
            case "feb":
                return "02";
                break;
            case "mar":
                return "03";
                break;
            case "apr":
                return "04";
                break;
            case "may":
                return "05";
                break;
            case "jun":
                return "06";
                break;
            case "jul":
                return "07";
                break;
            case "ags":
                return "08";
                break;
            case "sep":
                return "09";
                break;
            case "oct":
                return "10";
                break;
            case "nov":
                return "11";
                break;
            case "des":
                return "12";
                break;
        }
    }
}
