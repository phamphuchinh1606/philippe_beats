<?php
namespace App\Common;

use Carbon\Carbon;

class BeatsCityCommon{
    public static function dateFormat($value, $format = "d-M-Y H:i"){
        return Carbon::parse($value)->addHours(7)->format($format);
    }

    public static function getDayOnDate($value){
        return Carbon::parse($value)->addHours(7)->day;
    }
    public static function getMonthOnDate($value){
        return Carbon::parse($value)->addHours(7)->shortEnglishMonth;
    }

    public static function dateFormatText($value, $format = "d-M-Y H:i"){
        $today = date("d-M-Y");
        $another_date = Carbon::parse($value)->addHours(7);

        $days = (strtotime($today) - strtotime($another_date->format('d-M-Y')))/ (60 * 60 * 24);

        $dateMain = $another_date->format($format);
        if ($days == 0) {
            $date = "Today".' <span>'.$another_date->format('H:i').'</span>';
        } else if($days == 1){
            $date = "Yesterday".' <span>'.$another_date->format('H:i').'</span>';
        } else {
            $date = $dateMain;
        }
        return $date;
    }

    public static function showTextDot($value, $lengthText){
        if(strlen($value) > $lengthText){
            return substr($value,0,$lengthText).'...';
        }
        return $value;
    }
}
