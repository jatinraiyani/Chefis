<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\BaseFunction\BaseFunction;
use App\User;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payment;
use App\Models\UserCard;
use App\Models\OrderStatusLog;
use App\Models\UserAddress;
use App\Models\ItemOnDemand;
use App\Models\ItemTiming;
use App\Models\CMS;
use Stripe;
use Validator;
use Auth;
use DB;
use Config;
use Cookie;
use Redirect;

class CartController extends Controller
{
   public function checkout(){

       @$cart_data = json_decode($_COOKIE['cartdata']);
       $cms = CMS::where('slug','delivery_charge')->first();
       $deliveryCharge = $cms->meta_description;
       @$defaultAddress = $_COOKIE['address'];
       @$defaultLat = $_COOKIE['lat'];
       @$defaultLon = $_COOKIE['long'];

       $islogged = (Auth::check()) ? 1 : 0;

       if($islogged == 1)
       {
         $userid =  Auth::user()->id;
         $useraddress = DB::table('user_addresses')->where('user_id','=',$userid)->get();

         $userCard = UserCard::where('user_id',$userid)->where('save_status','yes')->get();

         return view('Frontend.cart.checkout',compact('cart_data','useraddress','userCard','defaultAddress','defaultLat','defaultLon','deliveryCharge'));
       }else{
         return view('Frontend.cart.checkout',compact('cart_data','deliveryCharge'));
       }

   }

  public function placeorder(Request $request){

    @$cart_data = json_decode($_COOKIE['cartdata']);
    $cms = CMS::where('slug','delivery_charge')->first();
    $currentDay = \Carbon\Carbon::now()->setTimezone('-5')->format('D');
    $currentTime = \Carbon\Carbon::now()->setTimezone('-5')->format('g:i');
    $currentDate = \Carbon\Carbon::now()->setTimezone('-5')->format('Y-m-d');

     foreach ($cart_data as $key => $value) {

       foreach ($value as $key => $values) {

        if($values->prodtype == 1){

          $getItemTime = ItemOnDemand::where('item_id',$values->id)->where('day',$currentDay)->where('status','open')->first();

          // if day is open then check slot start
          if($getItemTime){

              $qty = strtotime($currentTime) < strtotime($getItemTime->first_close) ? $getItemTime->first_qty : $getItemTime->second_qty;

              $getOrderedItems = Order::whereDate('updated_at',$currentDate)->where('payment_status','success')->where('prodtype',1)->get();

                if($getOrderedItems){
                  foreach ($getOrderedItems as $key => $value) {
                    foreach ($value->orderItem as $key => $orderItem) {
                      $orderItem->item_qty = (int)$orderItem->item_qty;
                      @$orderedQty += $orderItem->item_qty;
                    }
                     $checkQty = $orderedQty + $values->qty;

                  if($checkQty >= $qty){
                        return Redirect::back()->withErrors(['Your Order is Cancled Because of Item :"'.$values->name.'" is Out Of Stock.']);
                    }
                   }
                 }

          } else {
            return Redirect::back()->withErrors(['Today Item :"'.$values->name.'" is Not Available.']);
          }
          // if day is open then check slot end

        } else {  // put here item on schedule logic start
            $getItemTime = ItemTiming::where('item_id',$values->id)->where('day',$currentDay)->where('status','open')->first();

            if($getItemTime){

              $getOrderedItems = Order::whereDate('updated_at',$currentDate)->where('payment_status','success')->where('prodtype',2)->get();
                if($getOrderedItems){
                  foreach ($getOrderedItems as $key => $value) {
                    foreach ($value->orderItem as $key => $orderItem) {
                        $orderItem->item_qty = (int)$orderItem->item_qty;
                        @$orderedQty += $orderItem->item_qty;
                      }
                        $checkQty = $orderedQty + $values->qty;

                      if($checkQty >= $getItemTime->qty){

                          return Redirect::back()->withErrors(['Your Order is Cancled Because of Item :"'.$values->name.'" is Out Of Stock.']);
                      }

                   }
                 }
            } else {
              return Redirect::back()->withErrors(['Today Item :"'.$values->name.'" is Not Available.']);
            }
        }
     }
   }
    @$defaultAddress = $_COOKIE['address'];
    @$defaultLat = round($_COOKIE['lat'],6);
    @$defaultLon = round($_COOKIE['long'],6);

    @$defaultCity = $_COOKIE['city'];


      if($cart_data[0] != null){

      $rules = [
           'address' => 'required|numeric'
      ];
    }
      if($cart_data[0][0]->prodtype == 2){

        $rules = [
             'schedule_date' => 'required',
             'schedule_time' => 'required'
        ];

      }

      $validator = Validator::make($request->all(), $rules);

       if($validator->fails()) {
           return redirect()->back()
           ->withInput()
           ->withErrors($validator);
       }
             $addressId = $request->address;

      // store address if user select searched address start
          if($request->address == 0){

             $checkAddress = UserAddress::where('user_id',Auth::user()->id)->where('lat',$defaultLat)->where('lon',$defaultLon)->first();

             if(!$checkAddress){

              $add['user_id'] = Auth::user()->id;
              $add['name'] = Auth::user()->name;
              $add['address'] = $defaultAddress;
              $add['type'] = 'other';
              $add['contact_no'] = Auth::user()->phone_number;
              $add['lat'] = $defaultLat;
              $add['lon'] = $defaultLon;
              $add['city'] = $defaultCity;

              $addNewAddress = new UserAddress();
              $addNewAddress->fill($add);
              $addNewAddress->save($add);
              $addressId = $addNewAddress->id;

            } else {
              $addressId = $checkAddress->id;
            }
          }

      // store address if user select searched address end

      // get total payment AND total Quantities for stripe and Order start
      $totalPrice = 0;
      $totalQuantity = 0;

      foreach ($cart_data as $key => $carts) {
        $totalPrice+= $carts[0]->price*$carts[0]->qty;
        $totalQuantity+= $carts[0]->qty;
      }
      // get total payment AND total Quantities for stripe and Order start

     // stripe payment start

     \Stripe\Stripe::setApiKey(STRIPE_SECRET);
     \Stripe\Stripe::setApiVersion("2017-06-05");

     try {
       $card = $request->card ? $request->card : 0;
       $last_4 = '';
       $stripeToken = '';
       $stripeToken = isset($request->stripeToken) ? $request->stripeToken:"";
       $user_id = Auth::user()->id;
        // if($card == 0) {
        if($request->opn_tab == '#paymentmethod') {

             if(Auth::user()->customer_id == "") {

                 // create new stripe customer
                 $create_customer = \Stripe\Customer::create(array(
                   "description" => Auth::user()->email,
                   "source" => $stripeToken
                 ));

                 $customer_array = $create_customer->__toArray(true);

                 $id = $customer_array['id'];
                 $email = $customer_array['email'];

                 // update user payment id
                 $userUp = User::find($user_id);
                 $userUp->customer_id = $id;

                 if(!$userUp->update()){
                     throw new Exception("Unable to update payment id");
                 }

                 $card_array = $customer_array['sources']['data'][0];
                 $card_id = $card_array['id'];
                 $last_4 = $card_array['last4'];
                 $expiry_date = $card_array['exp_month']."-".$card_array['exp_year'];
                 $brand = $card_array['brand'];
                 $fingerprint = $card_array['fingerprint'];
                 $ref_id = $card_id;

             }else{

                 $id = Auth::user()->customer_id;

                 $customer = \Stripe\Customer::retrieve($id);
                 $create_card = $customer->sources->create(array("source" => $stripeToken));
                 $card_array = $create_card->__toArray(true);
                 $customer->default_source = $card_array['id'];
                 $customer->save();

                 $card_id = $card_array['id'];
                 $last_4 = $card_array['last4'];
                 $expiry_date = $card_array['exp_month']."-".$card_array['exp_year'];
                 $brand = $card_array['brand'];
                 $fingerprint = $card_array['fingerprint'];
                 $ref_id =$card_id;
             }

                 $checkCardExist = UserCard::where('fingerprint',$fingerprint)->first();

                 if(!$checkCardExist){

                 $saveCard['user_id'] = $user_id;
                 $saveCard['ref_id'] = $ref_id;
                 $saveCard['card_number'] = $last_4;
                 $saveCard['expiry_date'] = $expiry_date;
                 $saveCard['card_type'] = $brand;
                 $saveCard['save_status'] = $request->savecard;
                 $saveCard['fingerprint'] = $fingerprint;
                 $saved = new UserCard();
                 $saved->fill($saveCard);
                 $saved->save();

               } else {
                 $updateCardExist = UserCard::where('fingerprint',$fingerprint)->update(['save_status'=>$request->savecard]);
               }

        }else{


              $id = Auth::user()->customer_id;

              $card_id = DB::table('user_card')->where('id',$request->cardId)->first();

              $customer = \Stripe\Customer::retrieve($id);
              $customer->default_source = $card_id->ref_id;
              $customer->save();

              $brand = $card_id->card_type;
              $last_4 = $card_id->card_number;
              $card_type = $card_id->card_type;
              $ref_id = $card_id->ref_id;
        }

        $charge = \Stripe\Charge::create(array(
          "amount" => (int)(($totalPrice + $cms->meta_description)*100),
          "currency" => "mxn",
          "description" => "Charge for Chefis Order. ".Auth::user()->email,
          "customer" => $id
        ));

        $charge_array = $charge->__toArray(true);
        $charge_id = $charge_array['id'];

          if($charge_array['status'] == 'succeeded') {
            // order table data store start

              $order['user_id'] = Auth::user()->id;
              $order['chef_id'] = $cart_data[0][0]->chef_id;
              $order['order_number'] = $cart_data[0][0]->tmpid;
              $order['total_qty'] = $totalQuantity;
              $order['order_subtotal'] = round($totalPrice,2);
              $order['order_total'] = round($totalPrice,2);
              $order['order_discount'] = 0;
              $order['order_final_total'] = round(($totalPrice + $cms->meta_description), 2);
              $order['tax'] = 0;
              $order['address_id'] = $addressId;
              $order['order_status'] = 'pending';
              $order['order_cancel_reason'] = null;
              $order['transaction_id'] = $charge_id;
              $order['payment_method'] = 'stripe';
              $order['payment_status'] = $charge_array['status'] == 'succeeded' ? 'success' : 'failed';
              $order['order_suggetion'] = $request->order_suggetion;
              $order['prodtype'] = $cart_data[0][0]->prodtype;
              $order['schedule_date'] = $request->schedule_date;
              $order['schedule_time'] = $request->schedule_time;

              $orderStore =  new Order();
              $orderStore->fill($order);
              $orderStore->save();
            // order table data store start

            // payment table data store start
                $payment['order_id'] = $orderStore->id;
                $payment['order_number'] = $orderStore->order_number;
                $payment['payment_type'] = 'stripe';
                $payment['payment_id'] = $charge_id;
                $payment['payment_status'] = $charge_array['status'] == 'succeeded' ? 'success' : 'failed';
                $payment['amount'] = $charge_array['amount'];

                $storePayment = new Payment();
                $storePayment->fill($payment);
                $storePayment->save();

            // payment table data store end
            // order_status table data store start
                $orderStatus['order_id'] = $orderStore->id;
                $orderStatus['user_id'] = Auth::user()->id;
                $orderStatus['order_status'] = 'pending';

                $storeStatus = new OrderStatusLog();
                $storeStatus->fill($orderStatus);
                $storeStatus->save();

            // order_status table data store End

            //item store start
              foreach ($cart_data as $key => $cart) {

                $item['order_id'] = $orderStore->id;
                $item['chef_id'] = $cart[0]->chef_id;
                $item['item_id'] = $cart[0]->id;
                $item['item_name'] = $cart[0]->name;
                $item['item_price'] = $cart[0]->price;
                $item['item_qty'] = $cart[0]->qty;
                $item['item_suggetion'] = $cart[0]->itemsuggestions;
                $item['adons'] = $cart[0]->adons;
                $item['adons_price'] = $cart[0]->adprice;
                $item['adons_name'] = @$cart[0]->adonsname;

                $itemStore =  new OrderItems();
                $itemStore->fill($item);
                $itemStore->save();
              }
          }
          else {
               throw new Exception("Payment fail");
          }

     } catch(Stripe_CardError $e) {
           throw new Exception($e->getMessage());
       }
       catch (Stripe_InvalidRequestError $e) {
           // Invalid parameters were supplied to Stripe's API
           throw new Exception($e->getMessage());
       } catch (Stripe_AuthenticationError $e) {
           // Authentication with Stripe's API failed
           // (maybe you changed API keys recently)
           throw new Exception($e->getMessage());
       } catch (Stripe_ApiConnectionError $e) {
           // Network communication with Stripe failed
           throw new Exception($e->getMessage());
       } catch (Stripe_Error $e) {
           // Display a very generic error to the user, and maybe send // yourself an email
           throw new Exception($e->getMessage());
       }
     catch (Exception $e) {
       $response['status'] = 0;
       $response['data'] = NULL;
       $response['message'] = $e->getMessage() . ' on line ' . $e->getLine();
     }
     // stripe payment end

      if($charge_array['status'] == 'succeeded'){

        return redirect('/')->withCookie(Cookie::forget('cartdata'))->with('message','Hurray!,Your Order Placed successfully...!');
      }
    // order table data store end
   else {
     return redirect()->back()->with('message','Please Add Atleast One Product For Place Order.');
  }
  }

  public function checkDistance(Request $request){

    $getChef = User::where('id',$request->chefId)->first();

    if($request->type == 'dynemic'){

    $getAddress = UserAddress::where('id',$request->addressId)->first();
    echo $distance = \BaseFunction::findDistance($getAddress->lat,$getAddress->lon,$getChef->lat,$getChef->lang);

  } else {
    @$defaultLat = $_COOKIE['lat'];
    @$defaultLon = $_COOKIE['long'];
    echo $distance = \BaseFunction::findDistance($defaultLat,$defaultLon,$getChef->lat,$getChef->lang);
  }

  }
}



// ========================================================================= //
