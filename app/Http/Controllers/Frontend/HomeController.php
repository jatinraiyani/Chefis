<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\BaseFunction\BaseFunction;
use App\Models\CMS;
use App\Models\Item;
use App\Models\Cuisines;
use App\Models\ChefCuisines;
use App\Models\Area;
use App\Models\AreaInquiry;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use URL;

class HomeController extends Controller
{
    public function index()
    {
        $item = Item::inRandomOrder()->where('status', 'active')->get();

        $trending = Item::inRandomOrder()->where('status', 'active')->get();
        $chef = User::chefusers()->where('status', 'active')->get();
        foreach ($chef as $row) {
            $cusiniesarray = ChefCuisines::where('user_id', $row->id)->select('cuisine_id')->get();
            $cusinies = array();
            foreach ($cusiniesarray as $itemdata) {
                $cusinies[] = $itemdata->CuisinesData->cuisine_name;
            }
            $row['cusines'] = implode(',', $cusinies);
        }
        $areas = Area::get();
        return view('Frontend.index', compact('item', 'trending', 'chef','areas'));
    }

    public function aboutUs()
    {
        return view('Frontend.about_us');
    }
    public function cookWithUs()
    {
        return view('Frontend.cookwithus');
    }
    public function faq()
    {
        return view('Frontend.faq');
    }

    public function NearByDishes()
    {
        $item = Item::inRandomOrder()->where('status','active')->take(8)->get();
        return view('Frontend.near_by_dishes',compact('item'));
    }

    public function NearByCuisines()
    {
        $item = Item::inRandomOrder()->where('status','active')->take(8)->get();
        return view('Frontend.near_by_trending',compact('item'));
    }

    public function searchData(Request $request)
    {

        $lat = $_COOKIE['lat'];
        $lang = $_COOKIE['long'];
        $location = $_COOKIE['location'];

        $distanceRadius = CMS::where('slug', 'distance-radius')->value('meta_description');

        $search = $request['search'];

        $data = Item::leftjoin('users', 'users.id', '=', 'items.chef_id')
            ->leftjoin('chef_cuisines', 'chef_cuisines.user_id', '=', 'users.id')
            ->leftjoin('cuisines', 'cuisines.id', '=', 'chef_cuisines.cuisine_id')
            ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id', 3)
            ->Where(function ($query) use ($search) {
            $query->where('items.item_name', 'like', '%' . $search . '%')
                ->orwhere('users.name', 'like', '%' . $search . '%')
                ->orwhere('cuisines.cuisine_name', 'like', '%' . $search . '%');
            })
            ->select('users.name','users.profile_img','users.lat','users.lang','users.id as id')
            ->groupBy('users.id')
            ->get();

        foreach ($data as $row){

            $cusiniesarray = ChefCuisines::where('user_id',$row['id'])->select('cuisine_id')->get();
            $cusinies = array();
            foreach ($cusiniesarray as $itemdata){
                $cusinies[] = $itemdata['CuisinesData']['cuisine_name'];
            }
            $row['cusines'] = implode(',',$cusinies);

            $row['rating'] = '4.5';

            $row['distance'] = \BaseFunction::findDistance($row['lat'], $row['lang'], $lat, $lang);
        }

        $chef = array();
        foreach ($data as $row) {
            if ($distanceRadius >= $row['distance']) {
                $chef[] = $row;
            }
        }
        array_multisort(array_map(function($element) {
            return $element['distance'];
        }, $chef), SORT_ASC, $chef);

        $cuisines = Cuisines::where('status','active')->get();

        return view('Frontend.search',compact('chef','search','location','cuisines'));
    }

    public function storeAreaInquiry(Request $request){


      $this->validate($request,[
          'name'=>'required',
          'email'=>'required',
          'area_id'=>'required'
      ]);

     $data = $request->all();

     $store = new AreaInquiry();
     $store->fill($data);
     if($store->save()){
       return redirect('/')->with('message','your Area Request Submited Successfully...!');
     }
    }

}
