<?php

namespace App\Http\Controllers\Chef;

use App\Models\Category;
use App\Models\Cuisines;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use App\Models\ChefCuisines;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index(){
        $cuisine = Category::where('chef_id',Auth::user()->id)->count();
        $order = Order::whereNotIn('order_status', ['canceled_by_user', 'canceled_by_chef', 'canceled_by_admin'])
            ->where('chef_id',Auth::user()->id)->count();
        $item = Item::where('chef_id',Auth::user()->id)->count();
        $ordervalue = Order::whereNotIn('order_status', ['canceled_by_user', 'canceled_by_chef', 'canceled_by_admin'])
            ->where('chef_id',Auth::user()->id)->sum('order_final_total');
        // $order_data = Order::leftjoin('payments', 'payments.order_id', '=', 'orders.id')
        //     ->select('orders.*', 'payments.payment_type', 'payments.payment_id', 'payments.payment_status')
        //     ->orderBy('orders.id', 'DESC')
        //     ->where('orders.chef_id',Auth::user()->id)
        //     ->take(20)
        //     ->get();
       $order_data = Order::where('chef_id',Auth::user()->id)->get();

        foreach ($order_data as $row) {
            $row->order_item = OrderItems::where('order_id', $row->id)->get();
            $row->total_order_items = count($row->order_item);
        }

        return view('Chef.dashboard',compact('cuisine','order','item','ordervalue','order_data'));
    }
}
