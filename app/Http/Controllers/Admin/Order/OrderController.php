<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;
use App\Models\OrderStatusLog;
use App\Models\Payment;
use App\Models\UserAddress;
use App\Models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe;
use Session;
use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::get();
        return view('Admin.Order.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Order::findorFail($id);
        $address = UserAddress::where('id',$data->address_id)->first();
        $cms = CMS::where('slug','delivery_charge')->first();
        $deliveryCharge = $cms->meta_description;
        $color = \Config::get('constant.order_color');
        $color = $color[$data['order_status']];

        $status = \Config::get('constant.status');
        $status = $status[$data['order_status']];
        return view('Admin.Order.view',compact('data','address','color','status','deliveryCharge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id', $id)->delete();

        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Order Deleted Successfully.!! </div>');

        return \redirect('admin/order');
    }

    public function changeStatus(Request $request){
        $id = $request['id'];
        $status = $request['order_status'];

        $update_status = Order::where('id',$id)->update(['order_status'=>$status]);
        $getOrderDetails = Order::where('id',$id)->first();

        // refund if order cancel by chef start
        if($status == 'canceled_by_admin'){

          \Stripe\Stripe::setApiKey(STRIPE_SECRET);
          \Stripe\Stripe::setApiVersion("2017-06-05");

          $charge = \Stripe\Refund::create(array(
            "amount" => (int)$getOrderDetails->order_final_total,
            "charge" => $getOrderDetails->transaction_id
          ));

          $customer_array = $charge->__toArray(true);

          if($customer_array['status'] == 'succeeded'){

            // store in payment table start
            $refund['order_id'] = $getOrderDetails['id'];
            $refund['order_number'] = $getOrderDetails['order_number'];
            $refund['payment_type'] = 'stripe-'.$customer_array['object'];
            $refund['payment_id'] = $customer_array['charge'];
            $refund['payment_status'] = ($customer_array['status'] == 'succeeded') ? 'success' : 'failed';
            $refund['amount'] = $customer_array['amount'] * 100;

            $store = new Payment();
            $store->fill($refund);
            $store->save();
            // store in payment table end
          }
        }
        // refund if order cancel by chef end

        $data['order_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        $data['order_status'] = $status;

        $log = new OrderStatusLog();
        $log->fill($data);
        if($log->save()){
            return [
                'value' => 'done',
                'name' => $status,
                'status' => TRUE
            ];
        }
    }
}
