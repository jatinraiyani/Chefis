<?php

namespace App\Http\Controllers\Chef\Order;

use App\Models\Order;
use App\Models\UserAddress;
use App\User;
use App\Models\OrderStatusLog;
use App\Models\OrderItems;
use App\Models\Payment;
use App\Models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
        $data = Order::where('chef_id',Auth::user()->id)->get();
        // $data = Order::leftjoin('payments', 'payments.order_id', '=', 'orders.id')
        //     ->select('orders.*', 'payments.payment_type', 'payments.payment_id', 'payments.payment_status')
        //     ->orderBy('orders.id', 'DESC')
        //     ->where('orders.chef_id',Auth::user()->id)
        //     ->take(20)
        //     ->get();

        foreach ($data as $row) {
            $row->order_item = OrderItems::where('order_id', $row->id)->get();
            $row->total_order_items = count($row->order_item);
        }
        return view('Chef.Order.index',compact('data'));
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
        $cms = CMS::where('slug','delivery_charge')->first();
        $deliveryCharge = $cms->meta_description;

        if(Auth::user()->id == $data['chef_id']){
            // $address = explode(',',$data['order_address']);
            $address = UserAddress::where('id',$data->address_id)->first();
            $color = \Config::get('constant.order_color');
            $color = $color[$data['order_status']];

            $status = \Config::get('constant.status');
            $status = $status[$data['order_status']];
            return view('Chef.Order.view',compact('data','address','color','status','deliveryCharge'));
        } else {
            return redirect('chef-admin/order');
        }

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

        return \redirect('chef-admin/order');
    }

    public function changeStatus(Request $request){
        $id = $request['id'];
        $status = $request['order_status'];

        $update_status = Order::where('id',$id)->update(['order_status'=>$status]);
        $getOrderDetails = Order::where('id',$id)->first();
        $getUserDetails = User::where('id',$getOrderDetails->user_id)->first();
        $getAddressDetails = UserAddress::where('id',$getOrderDetails->address_id)->first();
        $address = $getAddressDetails->address.','.$getAddressDetails->address2.','.$getAddressDetails->city.','.$getAddressDetails->zipcode;

        // refund if order cancel by chef start
        if($status == 'canceled_by_chef'){

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
            // send mail to user after order confirm by chef start
            if($status == 'confirm'){
            $datas = array('email'=>$getUserDetails->email,'chefName' => Auth::user()->name,'userName'=>$getUserDetails->name,'address'=>$address);

              Mail::send('emails.orderConfirm',$datas,function($message) use($datas){
                $message->to($datas['email'],$datas['userName'])->subject('Order Confirm');
                $message->from('comida@chefis.app','Chefis');
              });
            }
            // send mail to user after order confirm by chef end

            return [
                'value' => 'done',
                'name' => $status,
                'status' => TRUE
            ];
        }
    }
}
