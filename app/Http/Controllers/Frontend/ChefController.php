<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ChefCuisines;
use App\Models\ChefDetails;
use App\Models\Cuisines;
use App\Models\Item;
use App\Models\ItemAdons;
use App\Models\ItemSubAdons;
use App\Models\ItemTiming;
use App\Models\UserWishlist;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChefController extends Controller
{
    public function index(Request $request)
    {

        $user = User::chefusers()->where('status', 'active')->take(9)->get();
        foreach ($user as $row) {
            $cusiniesarray = ChefCuisines::where('user_id', $row->id)->select('cuisine_id')->get();
            $cusinies = array();
            foreach ($cusiniesarray as $itemdata) {
                $cusinies[] = $itemdata->CuisinesData->cuisine_name;
            }
            $row['cusines'] = implode(',', $cusinies);
        }

        $cuisines = Cuisines::where('status', 'active')->get();
        return view('Frontend.Chef.chef_list', compact('user', 'cuisines'));
    }
    public function getproducttiming(Request $request){
        $id = $request['id'];
        $itemTimesdata = ItemTiming::where('item_id', $id)->get();
        $currentDay = \Carbon\Carbon::now()->setTimezone('-5')->format('D');
        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('g:i A');
        $currentDate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
        foreach ($itemTimesdata as $row) {


                if($row['status'] == 'open')
                {
                   // find dead line day

                    $deleverd_day_name = \BaseFunction::getDayName($row['delivered_day']);
                    $actualDay = \Carbon\Carbon::parse("next {$deleverd_day_name}")->setTimezone('-5')->format('Y-m-d');


                    if($row['day'] != $deleverd_day_name){
                      if($row['day'] != $currentDay){
                        $lastDateOfDate = \Carbon\Carbon::parse($actualDay)->setTimezone('-5')->subDays(7)->format('Y-m-d');
                      } else {
                        $lastDateOfDate = \Carbon\Carbon::parse("last {$deleverd_day_name}")->setTimezone('-5')->format('Y-m-d');
                      }

                    } else {
                      if($currentDay == $row['day'])  {
                          $lastDateOfDate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                      } else {
                        $lastDateOfDate = \Carbon\Carbon::parse("next {$deleverd_day_name}")->setTimezone('-5')->format('Y-m-d');
                      }
                    }

                    // end
                    if($row['day'] == 'Mon')
                    {
                      if(strtotime($currentDate) <= strtotime($lastDateOfDate)){
                        $closetime = \Carbon\Carbon::parse(strtotime($row['close']))->format('g:i A');
                          if(strtotime($currentDate) == strtotime($lastDateOfDate) ){
                              if(strtotime($currentTime) < strtotime($closetime))
                              {
                                   $availabledate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                              }else{
                                   $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                             }
                           }else {
                             $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                           }
                      } else {
                        $availabledate =  \Carbon\Carbon::parse($row['day'])->setTimezone('-5')->addDays(7)->format('Y-m-d');
                      }

                    }
                    if($row['day'] == 'Tue')
                    {
                      if(strtotime($currentDate) <= strtotime($lastDateOfDate)){
                        $closetime = \Carbon\Carbon::parse(strtotime($row['close']))->setTimezone('-5')->format('g:i A');
                          if(strtotime($currentDate) == strtotime($lastDateOfDate) ){
                            \Log::debug('test');
                              if(strtotime($currentTime) < strtotime($closetime))
                              {
                                \Log::debug('yes');
                                   $availabledate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                              }else{
                                \Log::debug('no');
                                   $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                             }
                           }else {
                             \Log::debug('fails');
                             $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                           }
                      } else {
                        $availabledate = \Carbon\Carbon::parse($row['day'])->setTimezone('-5')->addDays(7)->format('Y-m-d');
                      }
                      \Log::debug($availabledate);
                    }
                    if($row['day'] == 'Wed')
                    {
                      if(strtotime($currentDate) <= strtotime($lastDateOfDate)){
                        $closetime = \Carbon\Carbon::parse(strtotime($row['close']))->setTimezone('-5')->format('g:i A');
                          if(strtotime($currentDate) == strtotime($lastDateOfDate) ){
                              if(strtotime($currentTime) < strtotime($closetime))
                              {
                                   $availabledate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                              }else{
                                   $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                             }
                           }else {
                             $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                           }
                      } else {
                        $availabledate =\Carbon\Carbon::parse($row['day'])->setTimezone('-5')->addDays(7)->format('Y-m-d');
                      }
                    }
                    if($row['day'] == 'Thu')
                    {
                      if(strtotime($currentDate) <= strtotime($lastDateOfDate)){
                        $closetime = \Carbon\Carbon::parse(strtotime($row['close']))->setTimezone('-5')->format('g:i A');
                          if(strtotime($currentDate) == strtotime($lastDateOfDate) ){
                              if(strtotime($currentTime) < strtotime($closetime))
                              {
                                   $availabledate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                              }else{
                                   $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                             }
                           }else {
                             $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                           }
                      } else {
                        $availabledate = \Carbon\Carbon::parse($row['day'])->setTimezone('-5')->addDays(7)->format('Y-m-d');
                      }
                    }
                    if($row['day'] == 'Fri')
                    {
                      if(strtotime($currentDate) <= strtotime($lastDateOfDate)){
                        $closetime = \Carbon\Carbon::parse(strtotime($row['close']))->setTimezone('-5')->format('g:i A');
                          if(strtotime($currentDate) == strtotime($lastDateOfDate) ){
                              if(strtotime($currentTime) < strtotime($closetime))
                              {
                                   $availabledate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                              }else{
                                   $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                             }
                           }else {
                             $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                           }
                      } else {
                        $availabledate = \Carbon\Carbon::parse($row['day'])->setTimezone('-5')->addDays(7)->format('Y-m-d');
                      }
                    }
                    if($row['day'] == 'Sat')
                    {

                      if(strtotime($currentDate) <= strtotime($lastDateOfDate)){
                        $closetime = \Carbon\Carbon::parse(strtotime($row['close']))->setTimezone('-5')->format('g:i A');
                          if(strtotime($currentDate) == strtotime($lastDateOfDate) ){
                              if(strtotime($currentTime) < strtotime($closetime))
                              {
                                   $availabledate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                              }else{
                                   $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                             }
                           }else {
                             $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                           }
                      } else {
                        $availabledate = \Carbon\Carbon::parse($row['day'])->setTimezone('-5')->addDays(7)->format('Y-m-d');
                      }
                    }
                    if($row['day'] == 'Sun')
                    {

                      if(strtotime($currentDate) <= strtotime($lastDateOfDate)){
                        $closetime = \Carbon\Carbon::parse(strtotime($row['close']))->setTimezone('-5')->format('g:i A');
                          if(strtotime($currentDate) == strtotime($lastDateOfDate) ){
                              if(strtotime($currentTime) < strtotime($closetime))
                              {
                                   $availabledate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');
                              }else{
                                   $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                             }
                           }else {
                             $availabledate =  \Carbon\Carbon::parse("next {$row['day']}")->setTimezone('-5')->format('Y-m-d');
                           }
                      } else {
                        $availabledate = \Carbon\Carbon::parse($row['day'])->setTimezone('-5')->addDays(7)->format('Y-m-d');
                      }

                    }

                    $result = array("currentdate"=>date('Y-m-d'),"available_date"=>$availabledate,"day"=>$row['day'],"start"=>\Carbon\Carbon::parse(strtotime($row['open']))->format('g:i A'),"close"=>\Carbon\Carbon::parse(strtotime($row['close']))->format('g:i A'));
                    $data[] = $result;
                }
        }

        //usort($array, array('ClassName','merchantSort'));
        usort($data, array($this,'date_compare'));

        return [
            'data' => $data,
            'status' => TRUE
        ];

    }
    public function date_compare($a, $b)
    {
        $t1 = strtotime($a['available_date']);
        $t2 = strtotime($b['available_date']);
        return $t1 - $t2;
    }

    public function chefDetails($id)
    {

        $islogged = (Auth::check()) ? 1 : 0;

        $user = User::where('name', str_replace('-', ' ', $id))->first();

        @$chefDetails = ChefDetails::where('chef_id',$user->id)->first();

        $cusiniesarray = ChefCuisines::where('user_id', $user->id)->select('cuisine_id')->get();
        $cusinies = array();
        foreach ($cusiniesarray as $row) {
            $cusinies[] = $row->CuisinesData->cuisine_name;
        }
        $user['cusines'] = $cusinies;


        $currentDay = \Carbon\Carbon::now()->setTimezone('-5')->format('D');
        $currentDate = \Carbon\Carbon::now()->setTimezone('-5')->format('d');
        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');


        $itemsData = Item::where('chef_id', $user->id)->inRandomOrder()->get();

        $ondemand = array();
        $ongoing = array();
        $schdeules = array();
        $datas = array();
        foreach ($itemsData as $row) {
            if($islogged == 1)
            {
                $userid =  Auth::user()->id;
                $checkvalidation = UserWishlist::where('user_id', $userid)->where('item_id',$row->id)->first();
                if (!empty($checkvalidation)) {
                    //$delete = UserWishlist::where('user_id', $userid)->where('item_id',$itemid)->delete();
                    $row->is_favorite = 1;
                }else{
                    $row->is_favorite = 0;
                }

            }else{
                $row->is_favorite = 0;
            }
            /*echo "<pre>";
            print_r($row);
            die;*/
            $row->finalprice = number_format(\BaseFunction::finalprise($row->item_price),2);
            $checkopen = \BaseFunction::ItemOnDemand($row->id);
            $addonscount = ItemAdons::where('item_id',$row->id)->count();

            if ($checkopen == 'open') {
                $row->open_status = 'open';
                $row->addonscount = $addonscount;
                $ondemand[] = $row;
                $ongoing[] = $row->id;
            }
        }


        $schdeule = Item::where('chef_id', $user->id)->get();
        foreach ($schdeule as $value) {
            $timing = array();
            $open = array();
            $close = array();
            $days = array();

            $checkopens = \BaseFunction::ItemSchedule($value->id);
            if ($checkopens == 'open') {
                $value->open_status = 'open';
            } else {
                $value->open_status = 'close';
            }
            $value->addonscount = ItemAdons::where('item_id',$value->id)->count();
            $itemTimes = ItemTiming::where('item_id', $value->id)->where('day', $currentDay)->first();

            $itemTimesdata = ItemTiming::where('item_id', $value->id)->get();

            $value->itemtimedata = $itemTimesdata;

            $value->day = (is_null($itemTimes['delivered_day'])) ? '':$itemTimes['day'];
            $value->start = (is_null($itemTimes['delivered_time'])) ? '00:00' : $itemTimes['delivered_time'];
            $value->open_timing = \Carbon\Carbon::parse($value->start)->format('g:i A');
            if($islogged == 1)
            {
                $userid =  Auth::user()->id;
                $checkvalidation2 = UserWishlist::where('user_id', $userid)->where('item_id',$value->id)->first();
                if (!empty($checkvalidation2)) {
                    //$delete = UserWishlist::where('user_id', $userid)->where('item_id',$itemid)->delete();
                    $value->is_favorite = 1;
                }else{
                    $value->is_favorite = 0;
                }

            }else{
                $value->is_favorite = 0;
            }
            $value->finalprice = number_format(\BaseFunction::finalprise($value->item_price),2);


            $schdeules[] = $value['start'];
            $schdeulesday[] = $value['open_status'];
            if($value->open_status == 'open'){
                if($value->day == $currentDay && $itemTimes['status'] == 'open')
                {

                    if(strtotime($currentTime) > strtotime($itemTimes['delivered_time']))
                    {
                        //dd($itemTimes);
                        $datas[] = $value;
                    }

                }

            }

        }
        //dd($datas);
        array_multisort(array_column($datas, 'day'), SORT_ASC, array_column($datas, 'start'), SORT_ASC, $datas);
        //array_multisort(array_filter(array_column($datas, 'day')));
        //array_multisort(array_filter(array_column($datas, 'start')));

        $schdeule = $datas;

        return view('Frontend.Chef.chef_details', compact('user', 'ondemand', 'schdeule','chefDetails'));

    }
}
