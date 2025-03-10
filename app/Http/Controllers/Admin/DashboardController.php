<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Cuisines;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;

class DashboardController extends Controller
{

    public function index()
    {
        $user = User::users()->where('status', 'active')->count();
        $chef = User::chefusers()->count();
        $driver = User::driverusers()->count();
        $cuisine = Cuisines::count();
        $category = Category::count();
        $order = Order::whereNotIn('order_status', ['canceled_by_user', 'canceled_by_chef', 'canceled_by_admin'])->count();
        $item = Item::count();
        $ordervalue = Order::whereNotIn('order_status', ['canceled_by_user', 'canceled_by_chef', 'canceled_by_admin'])->sum('order_final_total');


        $transaction = Order::leftjoin('payments', 'payments.order_id', '=', 'orders.id')
            ->select('orders.*', 'payments.payment_type', 'payments.payment_id', 'payments.payment_status')
            ->orderBy('orders.id', 'DESC')
            ->take(5)
            ->get();

        foreach ($transaction as $row) {
            $row->order_item = OrderItems::where('order_id', $row->id)->get();
            $row->total_order_items = count($row->order_item);
        }
        $order_data = Order::get();
        // $order_data = Order::leftjoin('payments', 'payments.order_id', '=', 'orders.id')
        //     ->select('orders.*', 'payments.payment_type', 'payments.payment_id', 'payments.payment_status')
        //     ->orderBy('orders.updated_at', 'DESC')
        //     ->take(10)
        //     ->get();

        foreach ($order_data as $row) {
            $row->order_item = OrderItems::where('order_id', $row->id)->get();
            $row->total_order_items = count($row->order_item);
        }

        return view('Admin.dashboard', compact('user', 'chef', 'driver', 'cuisine', 'category', 'order', 'item', 'ordervalue', 'transaction', 'order_data'));
    }
}
