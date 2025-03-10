<?php

namespace App\Helpers\BaseFunction;

use App\Models\ItemCuisine;
use App\Models\ItemOnDemand;
use App\Models\ItemTiming;
use App\Models\LoginLog;

class BaseFunction
{
    public static function findDistance($lat1, $lng1, $lat2, $lng2)
    {

        if($lat1 == 'N/A' || $lat1 == ''){
            $lat1 = '19.4326';
        }

        if($lng1 == 'N/A' || $lng1 == ''){
            $lng1 = '99.1332';
        }
        $theta = $lng1 - $lng2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $km = round($miles * 1.609344,2);
        return $km;
    }

    public static function checkProductTime($id){

        $currentDay = \Carbon\Carbon::now()->setTimezone('-5')->format('D');
        $currentDate = \Carbon\Carbon::now()->setTimezone('-5')->format('d');
        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');

        $itemTime = ItemTiming::where('item_id', $id)->where('day', $currentDay)->first();
        $is_open = 'yes';
        // $is_open = 'no';
        // if ($itemTime['status'] == 'open') {
        //
        //     if ($currentTime >= $itemTime['open'] && $currentTime <= $itemTime['close']) {
        //         $is_open = 'yes';
        //     }
        // }

        return $is_open;
    }

    public static function LoginLog($id){
        $data['user_id'] =$id;
        $data['date'] = \Carbon\Carbon::now()->format('Y-m-d');

        $log = new LoginLog();
        $log->fill($data);
        $log->save();
    }

    public static function ItemOnDemand($id){
        $currentDay = \Carbon\Carbon::now()->setTimezone('-5')->format('D');
        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');
        $data = ItemOnDemand::where('item_id',$id)->where('day',$currentDay)->first();

        if(($data['first_open'] <= $currentTime && $data['first_close'] >= $currentTime) || ($data['second_open'] <= $currentTime && $data['second_close'] >= $currentTime)){
            $time = 'open';
        } else {
            $time = 'close';
        }
        return $time;
    }

    public static function ItemSchedule($id){
        $currentDay = \Carbon\Carbon::now()->setTimezone('-5')->format('D');
        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');
        $data = ItemTiming::where('item_id',$id)->where('day',$currentDay)->first();
        $time = 'open';
        // if($data['open'] <= $currentTime && $data['close'] >= $currentTime){
        //     $time = 'open';
        // } else {
        //     $time = 'close';
        // }
        return $time;
    }

    public static function ItemCuisine($id){
        $data = ItemCuisine::where('item_id',$id)->get();
        $value = array();
        foreach ($data as $row){
            $value[] = $row->CuisineDatas->cuisine_name;
        }
        return implode(', ',$value);
    }
    public static function finalprise($price)
    {
        $chefpercentage = $price * 15 / 100;
        $finalprice = $price + $chefpercentage;
        return $finalprice;
    }

    public static function getDayName($day){

      @$days = \Config::get('constant.day');

      return $days[$day];

    }
}
