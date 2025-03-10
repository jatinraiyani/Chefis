<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ChefCuisines;
use App\Models\CMS;
use App\Models\Cuisines;
use App\Models\Item;
use App\Models\ItemAdons;
use App\Models\ItemSubAdons;
use App\Models\ItemTiming;
use App\Models\UserWishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Auth;
use App\User;

class NearestController extends Controller
{
    public function nearestItem(Request $request)
    {

        $lat = $request['lat'];
        $lang = $request['lang'];
        $item_demand = $request['item_demand'];
        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');

        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');

        $item = Item::inRandomOrder()->where('status', 'active')->get();

        foreach ($item as $row) {
            $row->item_lat = @$row->chefData->lat;
            $row->item_lang = @$row->chefData->lang;

            if (file_exists(public_path('upload/item/' . $row->item_image)) && $row->item_image != '') {
                $row->item_image = URL::to('public/upload/item/' . $row->item_image);
            } else {
                $row->item_image = URL::to('public/default/default_user.png');
            }
            if($item_demand == 'ondemand'){
                $row->time = \BaseFunction::ItemOnDemand($row->id);
            } else {
                $row->time = \BaseFunction::ItemSchedule($row->id);
            }

            $row->category_name = \BaseFunction::ItemCuisine($row->id);
            $row->rating = '';
            $row->url_data = 'chef/' . strtolower(str_replace(' ', '-', $row->chefData->name));
            $row->distance = \BaseFunction::findDistance($row->item_lat, $row->item_lang, $lat, $lang);
        }

        $itemData = array();
        $i = 0;


        foreach ($item as $row) {
            if ($distanceRadius >= $row->distance && $row->time == 'open') {
                if ($i < 7 ) {
                    $itemData[] = $row;
                }
                $i++;
            }
        }

        $count = $i > 7 ? $i - 7 : 0;

        if (count($itemData) > 0)
            return [
                'value' => array('item' => $itemData, 'count' => $count),
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];

    }

    public function nearestChef(Request $request)
    {
        $lat = $request['lat'];
        $lang = $request['lang'];
        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');


        $chefData = User::chefusers()->where('status', 'active')->get();
        foreach ($chefData as $row) {
            if (file_exists(public_path('upload/user/' . $row->profile_img)) && $row->profile_img != '') {
                $row->profile_img = URL::to('public/upload/user/' . $row->profile_img);
            } else {
                $row->profile_img = URL::to('public/default/default_user.png');
            }
            $cusiniesarray = ChefCuisines::where('user_id', $row->id)->select('cuisine_id')->get();
            $cusinies = array();
            foreach ($cusiniesarray as $itemdata) {
                $cusinies[] = $itemdata->CuisinesData->cuisine_name;
            }
            $row['cusines'] = implode(', ', $cusinies);
            $row->url_data = strtolower(str_replace(' ', '-', $row->name));
            $row->distance = \BaseFunction::findDistance($row->lat, $row->lang, $lat, $lang);
        }

        $chef = array();
        foreach ($chefData as $row) {
            if ($distanceRadius >= $row->distance) {
                $chef[] = $row;
            }
        }


        if (count($chef) > 0)
            return [
                'value' => $chef,
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];
    }

    public function nearestTrendingItem(Request $request)
    {
        $lat = $request['lat'];
        $lang = $request['lang'];
        $item_demand = $request['item_demand'];
        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');

        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');

        $item = Item::inRandomOrder()->where('status', 'active')->get();

        foreach ($item as $row) {
            $row->item_lat = @$row->chefData->lat;
            $row->item_lang = @$row->chefData->lang;

            if (file_exists(public_path('upload/item/' . $row->item_image)) && $row->item_image != '') {
                $row->item_image = URL::to('public/upload/item/' . $row->item_image);
            } else {
                $row->item_image = URL::to('public/default/default_user.png');
            }
            $row->category_name = \BaseFunction::ItemCuisine($row->id);
            $row->rating = '';
            $row->distance = \BaseFunction::findDistance($row->item_lat, $row->item_lang, $lat, $lang);

            if($item_demand == 'ondemand'){
                $row->time = \BaseFunction::ItemOnDemand($row->id);
            } else {
                $row->time = \BaseFunction::ItemSchedule($row->id);
            }


        }

        $itemData = array();
        $i = 0;
        foreach ($item as $row) {
            if ($distanceRadius >= $row->distance && $row->time == 'open') {
                if ($i < 8) {
                    $itemData[] = $row;
                }
                $i++;
            }
        }

        $count = $i > 8 ? $i - 8 : 0;


        if (count($itemData) > 0)
            return [
                'value' => array('item' => $itemData, 'count' => $count),
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];
    }

    /**
     * Near by dishes page
     * @param Request $request
     * @return array
     */
    public function nearestItems(Request $request)
    {

        $lat = $request['lat'];
        $lang = $request['lang'];
        $item_demand = $request['item_demand'];
        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');
        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');
        $item = Item::where('status', 'active')->get();

        foreach ($item as $row) {
            $row->item_lat = @$row->chefData->lat;
            $row->item_lang = @$row->chefData->lang;

            if (file_exists(public_path('upload/item/' . $row->item_image)) && $row->item_image != '') {
                $row->item_image = URL::to('public/upload/item/' . $row->item_image);
            } else {
                $row->item_image = URL::to('public/default/default_user.png');
            }
            $row->category_name = \BaseFunction::ItemCuisine($row->id);
            $row->rating = '';
            $row->url_data = 'chef/' . strtolower(str_replace(' ', '-', $row->chefData->name));
            $row->distance = \BaseFunction::findDistance($row->item_lat, $row->item_lang, $lat, $lang);
            if($item_demand == 'ondemand'){
                $row->time = \BaseFunction::ItemOnDemand($row->id);
            } else {
                $row->time = \BaseFunction::ItemSchedule($row->id);
            }
        }

        $itemData = array();

        foreach ($item as $row) {
            if ($distanceRadius >= $row->distance && $row->time == 'open') {
                $itemData[] = $row;
            }
        }

        array_multisort(array_map(function ($element) {
            return $element['distance'];
        }, $itemData), SORT_ASC, $itemData);


//dd($itemData);
        if (count($itemData) > 0)
            return [
                'value' => $itemData,
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];

    }

    /**
     * Near By Trending Cuisinies
     * @param Request $request
     * @return array
     */
    public function nearestCuisines(Request $request)
    {

        $lat = $request['lat'];
        $lang = $request['lang'];
        $item_demand = $request['item_demand'];

        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');
        $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('H:i');
        $item = Item::where('status', 'active')->get();

        foreach ($item as $row) {
            $row->item_lat = @$row->chefData->lat;
            $row->item_lang = @$row->chefData->lang;

            if (file_exists(public_path('upload/item/' . $row->item_image)) && $row->item_image != '') {
                $row->item_image = URL::to('public/upload/item/' . $row->item_image);
            } else {
                $row->item_image = URL::to('public/default/default_user.png');
            }
            $row->category_name = \BaseFunction::ItemCuisine($row->id);
            $row->rating = '';
            $row->url_data = 'chef/' . strtolower(str_replace(' ', '-', $row->chefData->name));
            $row->distance = \BaseFunction::findDistance($row->item_lat, $row->item_lang, $lat, $lang);
            if($item_demand == 'ondemand'){
                $row->time = \BaseFunction::ItemOnDemand($row->id);
            } else {
                $row->time = \BaseFunction::ItemSchedule($row->id);
            }
        }

        $itemData = array();

        foreach ($item as $row) {
            if ($distanceRadius >= $row->distance && $row->time == 'open') {
                $itemData[] = $row;
            }
        }

        array_multisort(array_map(function ($element) {
            return $element['distance'];
        }, $itemData), SORT_ASC, $itemData);


//dd($itemData);
        if (count($itemData) > 0)
            return [
                'value' => $itemData,
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];

    }

    /**
     * Near By Cheflist page
     * @param Request $request
     * @return array
     */
    public function nearestChefList(Request $request)
    {
        $lat = $request['lat'];
        $lang = $request['lang'];

        \Log::debug($request->all());
        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');
        if (isset($request['cuisine'])) {

            $dataCuisine = $request['cuisine'];
        } else {
            $dataCuisine = array();
        }

        $chefData = User::chefusers()->where('status', 'active')->get();

        foreach ($chefData as $row) {
            if (file_exists(public_path('upload/user/' . $row->profile_img)) && $row->profile_img != '') {
                $row->profile_img = URL::to('public/upload/user/' . $row->profile_img);
            } else {
                $row->profile_img = URL::to('public/default/default_user.png');
            }
            $cusiniesarray = ChefCuisines::where('user_id', $row->id)->select('cuisine_id')->get();
            $cusinies = array();
            foreach ($cusiniesarray as $itemdata) {
                if (count($dataCuisine) > 0) {
                    if (in_array($itemdata->cuisine_id, $dataCuisine)) {
                        $row->is_cover = 'yes';
                    }
                }

                $cusinies[] = $itemdata->CuisinesData->cuisine_name;
            }
            $row['cusines'] = implode(', ', $cusinies);
            $row->url_data = strtolower(str_replace(' ', '-', $row->name));
            $row->distance = \BaseFunction::findDistance($row->lat, $row->lang, $lat, $lang);
        }

        $chef = array();
        foreach ($chefData as $row) {
            if ($distanceRadius >= $row->distance) {
            if (count($dataCuisine) > 0) {
                if ($row->is_cover == 'yes') {
                    $chef[] = $row;
                }
            } else {
                $chef[] = $row;
            }

           }
        }

        array_multisort(array_map(function ($element) {
            return $element['distance'];
        }, $chef), SORT_ASC, $chef);

        if (count($chef) > 0)
            return [
                'value' => $chef,
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];
    }

    public function searchList(Request $request)
    {
        $lat = $request['lat'];
        $lang = $request['lang'];
        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');

        /**
         * Item Getting Start
         */
        $item = Item::where('status', 'active')->get();

        foreach ($item as $row) {
            $row->item_lat = @$row->chefData->lat;
            $row->item_lang = @$row->chefData->lang;

            $row->distance = \BaseFunction::findDistance($row->item_lat, $row->item_lang, $lat, $lang);
        }

        $itemData = array();

        foreach ($item as $row) {
            if ($distanceRadius >= $row->distance) {
                $itemData[] = array(
                    'name' => $row->item_name,
                    'id' => $row->id,
                    'distance' => $row->distance,
                    'type' => 'item'
                );
            }
        }

        array_multisort(array_map(function ($element) {
            return $element['distance'];
        }, $itemData), SORT_ASC, $itemData);

        /**
         * Item Getting End
         */


        $chefData = User::chefusers()->where('status', 'active')->get();

        foreach ($chefData as $row) {

            $cusiniesarray = ChefCuisines::where('user_id', $row['id'])->select('cuisine_id')->get();
            $cusinies = array();
            foreach ($cusiniesarray as $itemdata) {
                $cusinies[] = $itemdata['CuisinesData']['cuisine_name'];
            }
            $row['cusines'] = implode(', ', $cusinies);
            $row['distance'] = \BaseFunction::findDistance($row['lat'], $row['lang'], $lat, $lang);
        }

        $chef = array();
        foreach ($chefData as $row) {
            if ($distanceRadius >= $row['distance']) {
                $chef[] = array('name' => $row['name'],
                    'id' => $row['id'],
                    'distance' => $row['distance'],
                    'type' => 'chef'
                );
            }
        }

        array_multisort(array_map(function ($element) {
            return $element['distance'];
        }, $chef), SORT_ASC, $chef);


        $cusinie = Cuisines::join('chef_cuisines','cuisine_id','cuisines.id')
            ->where('cuisines.status','active')
            ->select('cuisines.cuisine_name as name','cuisines.id')
            ->get();
        foreach ($cusinie as $row){
            $row->type = 'cuisines';
        }
        $data['chef'] = $chef;
        $data['item'] = $itemData;
        $data['cuisines'] = $cusinie;

        if (count($data) > 0)
            return [
                'value' => $data,
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];

    }

    public function searchFilter(Request $request)
    {
        $lat = $request['lat'];
        $lang = $request['lang'];

        $search = $_COOKIE['search_words'];

        $location = $_COOKIE['location'];

        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');
        if (isset($request['cuisine'])) {

            $dataCuisine = $request['cuisine'];
        } else {
            $dataCuisine = array();
        }

        $chefData = User::chefusers()->where('status', 'active')->get();

        $chefData = Item::leftjoin('users', 'users.id', '=', 'items.chef_id')
            ->leftjoin('chef_cuisines', 'chef_cuisines.user_id', '=', 'users.id')
            ->leftjoin('cuisines', 'cuisines.id', '=', 'chef_cuisines.cuisine_id')
            ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id', 3)
            ->Where(function ($query) use ($search) {
                $query->where('items.item_name', 'like', '%' . $search . '%')
                    ->orwhere('users.name', 'like', '%' . $search . '%')
                    ->orwhere('cuisines.cuisine_name', 'like', '%' . $search . '%');
            })
            ->select('users.name', 'users.profile_img', 'users.lat', 'users.lang', 'users.id as id')
            ->groupBy('users.id')
            ->get();


        foreach ($chefData as $row) {

            if (file_exists(public_path('upload/user/' . $row->profile_img)) && $row->profile_img != '') {
                $row->profile_img = URL::to('public/upload/user/' . $row->profile_img);
            } else {
                $row->profile_img = URL::to('public/default/default_user.png');
            }
            $cusiniesarray = ChefCuisines::where('user_id', $row->id)->select('cuisine_id')->get();
            $cusinies = array();
            foreach ($cusiniesarray as $itemdata) {
                if (count($dataCuisine) > 0) {
                    if (in_array($itemdata->cuisine_id, $dataCuisine)) {
                        $row->is_cover = 'yes';
                    }
                }

                $cusinies[] = $itemdata->CuisinesData->cuisine_name;
            }
            $row['cusines'] = implode(', ', $cusinies);
            $row['rating'] = '4.5';

            $row->url_data = strtolower(str_replace(' ', '-', $row->name));
            $row->distance = \BaseFunction::findDistance($row->lat, $row->lang, $lat, $lang);
        }

        $chef = array();
        foreach ($chefData as $row) {
            if ($distanceRadius >= $row->distance) {
                if (count($dataCuisine) > 0) {
                    if ($row->is_cover == 'yes') {
                        $chef[] = $row;
                    }
                } else {
                    $chef[] = $row;
                }
            }
        }

        array_multisort(array_map(function ($element) {
            return $element['distance'];
        }, $chef), SORT_ASC, $chef);

        if (count($chef) > 0)
            return [
                'value' => $chef,
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];

    }

    public function getAdons(Request $request){
        $id = $request['id'];

        $item = Item::where('id',$id)->first();
        if (file_exists(public_path('upload/item/' . $item['item_image'])) && $item['item_image'] != '') {
            $item['item_image'] = URL::to('public/upload/item/' . $item['item_image']);
        } else {
            $item['item_image'] = URL::to('public/default/default_user.png');
        }
       $item['finalprice'] = number_format(\BaseFunction::finalprise($item['item_price']),2);
       $item['adons'] = ItemAdons::where('item_id',$id)->get();
        foreach ($item['adons'] as $row){
            $row['subadons'] = ItemSubAdons::where('adons_id',$row->id)->get();

        }
        if (!empty($item))
            return [
                'value' => $item,
                'status' => TRUE
            ];
        else
            return [
                'value' => 'No result Found',
                'status' => FALSE
            ];

    }
    public function addtofavrioute(Request $request)
    {
        if($request['type'] == 1)
          {
              $itemid = $request['item_id'];
                $userid =  Auth::user()->id;
                $checkvalidation = UserWishlist::where('user_id', $userid)->where('item_id',$itemid)->first();
                if (!empty($checkvalidation)) {
                    $delete = UserWishlist::where('user_id', $userid)->where('item_id',$itemid)->delete();
                }


                $data['user_id'] = $userid;
                $data['item_id'] = $itemid;
                $UserWishlist = new UserWishlist();
                $UserWishlist->fill($data);
                if ($UserWishlist->save()) {
                    return [
                    'msg' => "Your item is added into favorite",
                    'status' => TRUE
                ];

                }else{
                    return [
                    'msg' => "Somthing went wrong....",
                    'status' => false
                    ];
                }
          }
          if($request['type'] == 2)
          {
                $itemid = $request['item_id'];
                $userid =  Auth::user()->id;
                $checkvalidation = UserWishlist::where('user_id', $userid)->where('item_id',$itemid)->first();
                if (!empty($checkvalidation)) {
                    $delete = UserWishlist::where('user_id', $userid)->where('item_id',$itemid)->delete();
                    return [
                    'msg' => "Your item is remove into favorite",
                    'status' => TRUE
                    ];
                }else{ 
                    return [
                    'msg' => "Somthing went wrong....",
                    'status' => false
                    ]; 

                }
          }

            
        
    }
}

