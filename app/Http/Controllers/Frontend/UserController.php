<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\UserAddress;
use App\Models\UserWishlist;
use App\Models\UserCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function index(){

        $favorite = Item::leftjoin('user_wishlists','user_wishlists.item_id','=','items.id')
            ->where('user_wishlists.user_id',Auth::user()->id)
            ->select('items.*')
            ->get();
        $order = Order::where('user_id',Auth::user()->id)->get();
          // foreach ($order as $key => $value) {
          //       foreach($value->orderItem as $keys => $values){
          //
          //       }
          // }
          // dd($value->orderItem[0]->adons_name);

        $userAddress = UserAddress::where('user_id',Auth::user()->id)->get();
        $savedCard = UserCard::where('user_id',Auth::user()->id)->where('save_status','yes')->get();
        return view('Frontend.Auth.profile',compact('favorite','order','userAddress','savedCard'));
    }
}
