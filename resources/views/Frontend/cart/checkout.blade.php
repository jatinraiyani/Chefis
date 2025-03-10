@extends('layouts.frontend')
@section('front_title') Checkout @endsection
@section('front_css')
@endsection
@section('content')
    <section>
        <div class="container-check">
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="checkout-left">
                        <div class="shopping-cart-items">
                            <h3 class="mb-md-5">Checkout</h3>
                            <div class="checkout_data">
                            </div>
                        </div>
                        <form role="form" id="payment-form" method="POST" action="{{URL::to('placeorder')}}" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ (STRIPE_KEY)}}">
                          @if(Session::has('message'))
                          	<div class="alert alert-warning alert-dismissible">
                          		{!! session('message') !!}
                          	</div>
                          @endif
                          @if(!empty($errors->all()))
                            <div class="alert alert-danger">
                              @foreach($errors->all() as $error)
                                <span> {{ $error }} </span>
                              @endforeach
                            </div>
                          @endif
                          @csrf
                        <div id="Itemtimingslotday" class="row align-items-center" style="display:none">
                            <div class="col-md-auto">
                                <h5>Please Select Delivery Day & Time</h5>
                            </div>
                                <div class="form-group mb-0 col-md-3" id="daysdropdowndata"></div>
                                <div class="form-group mb-0 col-md-3" id="timepicker" style="display:none">
                                  <input class="form-control" name="schedule_time" placeholder="please select your time" id="input-time" type="text" data-field="time">
                                </div>
                            </div>
                        <div class="shopping-cart-header mt-md-5 pt-md-3">
                            <div class="shopping-cart-total">
                                <div class="row  align-items-center mb-2">
                                    <div class="col-8">
                                        <h6 class="mb-0">Subtotal :</h6>

                                    </div>
                                      <div class="col-4 text-right pr-4">
                                          <h4>$<span class="cart-total">0.00</span></h4>
                                      </div>
                                    </div>
                                    <div class="row  align-items-center mb-2">
                                        <div class="col-8">

                                              <p>Delivery Charge(35 peso)</p>
                                        </div>
                                        <div class="col-4 text-right pr-4">
                                            <h4>$<span class="deliverycharge">0.00</span></h4>
                                        </div>
                                      </div>
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h6 class="mb-0">Total :</h6>
                                          </div>
                                          <div class="col-4 text-right pr-4">
                                              <h4>$<span class="fulltotal">0.00</span></h4>
                                          </div>
                                        </div>
                                  </div>
                                </div>

                        <hr class="mt-4">
                        <div class="mt-3">
                            <h5>Driver Instruction</h5>
                            <textarea name="order_suggetion" id="order_suggetion" placeholder="Please write here..." class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="checkout-right">
                        <h3>Checkout</h3>
                        <div id="accordion">
                            <div class="card">
                                @if (!Auth::check())
                                <div class="card">
                                  <div class="card-header">
                                        <h5 class="mb-0">
                                        <button type="button" class="btn-link  text-left" data-toggle="collapse" data-target="#account" aria-expanded="true" aria-controls="collapseTwo">
                                         Account<i class="fa fa-caret-up pull-right" aria-hidden="true"></i>
                                        </button>
                                    </h5> </div>
                                                <div id="account" class=" collapsed show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                     <div class="login-checkout">
                                                       <button class="btn" type="button" onclick="showlogin(1)">
                                                       <span>Have an account?</span>
                                                       <span>LOG IN</span>
                                                   </button>
                                                    <button class="btn signup-btn" type="button" onclick="showlogin(2)">
                                                       <span>New to Chefis</span>
                                                       <span>SIGN UP</span>
                                                   </button>
                                                </div>
                                                </div>
                                                </div>
                                </div>
                                @endif
                                @if (Auth::check())
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                          <button type="button" class="btn-link text-left" data-toggle="collapse" data-target="#address" aria-expanded="true" aria-controls="collapseTwo">
                                           Address<i class="fa fa-caret-up pull-right" aria-hidden="true"></i>
                                          </button>
                                      </h5>
                                    </div>
                                    <div id="address" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                          <!-- default address strat -->
                                          <div class="address">
                                              <h5 class="mb-0 mt-3">{{Auth::user()->name}}</h5>
                                              <address>
                                               <p>{{$defaultAddress}}</p>
                                               <p>{{Auth::user()->phone_number}}</p>
                                              </address>
                                              <div class="custom-control custom-radio select-address">
                                                <input type="radio" class="radioButton" name="address" data-add="0" value="0">
                                              </div>
                                          </div>
                                          <!-- default address end -->
                                           @forelse($useraddress as $address)
                                             <div class="address" data-address="{{$address->id}}">
                                                 <span class="badge badge-secondary">{{$address->type}}</span>
                                                 <h5 class="mb-0 mt-3">{{$address->name}}</h5>
                                                 <address>
         																					<p>{{$address->address}} @if($address->address2),{{$address->address2}}@endif</p>
         																					<p>{{$address->landmark}}</p>
         																					<p>{{$address->city}},{{$address->zipcode}}</p>
         																					<p>{{$address->contact_no}}</p>
                                                 </address>
                                                 <div class="custom-control custom-radio select-address">
                                                   <input type="radio" class="radioButton" name="address" data-add="{{$address->id}}" value="{{$address->id}}">
                                                 </div>
                                             </div>
                                             @empty
                                             <div class="col-12 text-center">No Address Found.</div>
                                             @endforelse
                                        <button type="button" class="btn btn-lg btn-block " data-toggle="modal" data-target="#moreaddress">Add More Address</button>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                          <button type="button" disabled class="btn-link text-left collapsed" data-toggle="collapse" data-target="#address" aria-expanded="false" aria-controls="collapseTwo">
                                           Address<i class="fa fa-caret-up pull-right" aria-hidden="true"></i>
                                          </button>
                                      </h5>
                                    </div>
                                    <div id="address" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                             <button type="button" class="btn btn-lg btn-block " data-toggle="modal" data-target="#moreaddress">Add More Address</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="card">
                                <div class="card-header ">
                                  @if(Auth::check())
                                    <button type="button" class=" btn-link text-left collapsed savedButton nPayment"  data-toggle="collapse" data-target="#savedCard" aria-expanded="false" aria-controls="collapseOne"> Payment With Saved Card<i class="fa fa-caret-up pull-right" aria-hidden="true"></i> </button>
                                  @else
                                  <lable class=" btn-link text-left"> Payment With Saved Card<i class="fa fa-caret-up pull-right" aria-hidden="true"></i>
                                  @endif
                                </div>
                                <!-- Saved Card div start -->
                                @if(Auth::check())
                                <div id="savedCard" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                  <!-- <form role="form"  method="POST" action="{{URL::to('placeorder')}}" > -->
                                    @csrf
                                    <!-- <div class="card-body"> -->
                                        <div class="panel-body">
                                          <div id="savedCardDiv">
                                               <div class='form-row row'>
                                                   <div class='col-12 form-group'>
                                                       <label class='control-label'>Card Number</label>
                                                       @forelse($userCard as $cards)
                                                       <div Class="check-card">
                                                       <div class=" row">
                                                         <div class="col-6">
                                                         <input type="radio" class="cardId" name="cardId" value="{{$cards->id}}" data-card="{{$cards->id}}">
                                                         <p class="check-master">{{$cards->card_type}}</p>
                                                       </div>
                                                          <div class="col-6 text-right pl-0">
                                                            <input  class="" value="xxxx-xxxx-xxxx-{{$cards->card_number}}"  readonly type="text">
                                                             <p class="">{{$cards->expiry_date}}</p>
                                                          </div>
                                                      </div>
                                                    </div>
                                                       @empty
                                                       <div class="col-12 text-center">No Card Found.</div>
                                                       @endforelse
                                                   </div>

                                                   <input type="hidden" name="card" class="form-control" id="selectedCardId" value="">
                                                   <input type="hidden" name="address" class="form-control" id="savedAddress" value="">
                                                   <input type="hidden" name="order_suggetion" class="form-control" id="savedOrderSuggetion" value="">
                                                   <input type="hidden" name="schedule_date" class="form-control" id="savedDate" value="">
                                                   <input type="hidden" name="schedule_time" class="form-control" id="savedTime" value="">
                                               </div>
                                            </div>
                                              <div class="row">
                                                  <div class="col-12">
                                                      <!-- <button class="btn btn-success btn-lg btn-block" id="savedCardButton" type="submit">Place Order</button> -->
                                                  </div>
                                              </div>
                                          <!-- </form> -->
                                      </div>
                                    <!-- </div> -->
                                </div>
                                @endif
                                <!-- Saved Card div End -->
                              </div>
                                <div class="card-header">
                                    @if(Auth::check())
                                    <button type="button" class="btn-link text-left collapsed paymentButton nPayment"  data-toggle="collapse" data-target="#paymentmethod" aria-expanded="false" aria-controls="collapseOne">Payment With New Card<i class="fa fa-caret-up pull-right" aria-hidden="true"></i> </button>
                                    @else
                                    <lable class=" btn-link text-left">Payment With New Card<i class="fa fa-caret-up pull-right" aria-hidden="true"></i>
                                    @endif
                                </div>
                                <div id="paymentmethod" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="panel-body">
                                          <div id="cardDiv"> <!-- credit start for cod and credit -->
                                            @if (Session::has('success'))
                                                 <div class="alert alert-success text-center">
                                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                     <p>{{ Session::get('success') }}</p>
                                                 </div>
                                             @endif
                                              <input type="hidden" name="savecard" id="savecard" value="">
                                               <div class='form-row row'>
                                                   <div class='col-12 form-group card required'>
                                                       <label class='control-label'>Card Number</label> <input
                                                           autocomplete='off' class='form-control card-number' size='20'
                                                           type='text'>
                                                   </div>
                                               </div>

                                               <div class='form-row row'>
                                                   <div class='col-12 col-md-4 form-group cvc required'>
                                                       <label class='control-label'>CVC</label> <input autocomplete='off'
                                                           class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                           type='text'>
                                                   </div>
                                                   <div class='col-12 col-md-4 form-group expiration required'>
                                                       <label class='control-label'>Exp. Month</label> <input
                                                           class='form-control card-expiry-month' placeholder='MM' size='2'
                                                           type='text'>
                                                   </div>
                                                   <div class='col-12 col-md-4 form-group expiration required'>
                                                       <label class='control-label'>Exp. Year</label> <input
                                                           class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                           type='text'>
                                                   </div>
                                               </div>
                                               <div class='form-row row'>
                                                   <div class='col-md-12 error form-group hide'>
                                                       <div class='alert-danger alert'></div>
                                                   </div>
                                               </div>
                                            </div> <!-- credit end -->
                                              <div class="row">
                                                  <div class="col-12">
                                                      <!-- <button class="subscribe btn btn-success btn-lg btn-block" type="submit">Place Order</button> -->
                                                  </div>
                                              </div>
                                              <div class="row" style="display:none;">
                                                  <div class="col-12">
                                                      <p class="payment-errors"></p>
                                                  </div>
                                              </div>
                                          <!-- </form> -->
                                      </div>
                                    </div>
                                </div>

                                <input type="hidden" name="opn_tab" id="opn_tab">
                                <button class="btn btn-success btn-lg btn-block" id="savedCardButton" type="submit">Place Order</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end shopping-cart-header -->
        </div>
    </section>
    <!-- Modal -->
<div class="modal fade" id="moreaddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Address</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form class="card-form" method="POST" action="{{URL::to('addupdateaddress')}}">
       @csrf
       <input type="hidden" value="1" name="addform">
       <div class="form-row">
           <div class="form-group col-md-12">
               <input type="text" class="form-control" required="required" name="name" placeholder="Name">
             </div>

       </div>
       <div class="form-row">

           <div class="form-group col-md-12">
               <input type="text" class="form-control" required="required" name="address" placeholder="Address Line 1"> </div>
           <div class="form-group col-md-12">
               <input type="text" class="form-control"  name="address2" placeholder="Address Line 2"> </div>
           <div class="form-group col-md-12">
               <input type="text" class="form-control" required="required" name="contactnumber" placeholder="Contact number "> </div>
       </div>
       <div class="form-row">
           <div class="form-group col-md-6">
               <input type="text" class="form-control" required="required" name="zipcode" placeholder="ZIP Code"> </div>
           <div class="form-group col-md-6">
               <input type="text" class="form-control" required="required" name="city" placeholder="City"> </div>
       </div>
       <div class="form-row mb-3">
           <div class="col inputState3" id="inputState3">
           <select id="inputState2" class="form-control" name="addresstype" required="required">
               <option value="" selected>Choose Address Type</option>
               <option value="home">Home</option>
               <option value="work">Work</option>
               <option value="other">Other</option>
           </select>
           </div>
       </div>

       <div class="form-row mb-3">
           <div class="col">
               <input type="text" name="landmark" required="required" placeholder="landmark" class="form-control"> </div>
       </div>
      <button type="submit" class="btn btn-lg btn-block ">Add Address</button>
    </form>
      </div>

    </div>
  </div>
</div>
  <div id="dtBox"></div>
@endsection
@section('front_js')
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>

<script type="text/javascript">

// stripe Integration start
$(function() {

  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    if(opn_tab == '#paymentmethod') {
      var $form = $(".require-validation"),
          inputSelector = ['input[type=email]', 'input[type=password]',
                           'input[type=text]', 'input[type=file]',
                           'textarea'].join(', '),
          $inputs       = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid         = true;
          $errorMessage.addClass('hide');

          $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
          $input.parent().addClass('has-error');
          $errorMessage.removeClass('hide');
          e.preventDefault();
        }
      });

      if (!$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
      }
    }


  });

  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);

        } else {

            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            // ask for save card Start
            swal({
                title: "Are you want to save your card?",
                text: "You will use it In Future!",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No, cancel plx!",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Yes, Save it!",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            })
                .then((isConfirm) => {
                    if (isConfirm) {
                        $('#savecard').val('yes');
                        $form.get(0).submit();
                    } else {
                        $('#savecard').val('no');
                        $form.get(0).submit();
                    }
                });

          // ask for save card End

        }
    }

});
// stripe Integration End
    var opn_tab = '';
    $(document).ready(function () {

      $('.nPayment').click(function(e){
        e.preventDefault();
        // console.log($(this).data('target'));
        opn_tab = $(this).data('target');
        $('#opn_tab').val(opn_tab);
      })
        checkoutCartData();

    var chefId = localStorage.chef_id;
    var type = 'default';

    $.ajax({
        url: "{{URL::to('checkDistance')}}",
        type: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            "chefId": chefId,
            "type":type
        },
        success: function(result) {
           if(result > 10){
             event.preventDefault();
             swal('Area is not within delivery range,Please select another address');
                 $('.radioButton').prop('checked',false);
                 $('#savedAddress').val(null);
             } else {
               $('.radioButton[data-add="0"]').prop('checked',true);
               $('#savedAddress').val(0);
             }
        }

    });
    // check default address lat lon distance on page load End


   // clear local storage after order successful  start
        var cookies = getCookie("cartdata");
        if (!cookies) {
          localStorage.removeItem('cartdata');
          localStorage.removeItem('chef_id');
          $('#media').replaceWith('<div class="media text-center">No Item Found.</div>');
          $('.cart-total').text(0.00);
          $('.deliverycharge').text(0.00);
          $('.fulltotal').text(0.00);
          $('#Itemtimingslotday').hide();
          $('.checkout_data').html(html);
          $('.cart-items').text(0);
          $('.cart-total').text(0.00);

        }
   // clear local storage after order successful end
    });

    $(document).on('click','.radioButton',function(){

      // check address lat lon and chef lat lon distance is under 10 km strat

         var addressId = $(this).val();
         var chefId = localStorage.chef_id;
         var type = 'dynemic';

         $.ajax({
             url: "{{URL::to('checkDistance')}}",
             type: "POST",
             data: {
                 "_token": "{{ csrf_token() }}",
                 "addressId": addressId,
                 "chefId": chefId,
                 "type":type
             },
             success: function(result) {
                if(result > 10){
                  event.preventDefault();
                  swal('Area is not within delivery range,Please select another address');
                  $('.radioButton').prop('checked',false);
                  $('#savedAddress').val(null);
                  }
                 }
             });

      // check address lat lon and chef lat lon distance is under 10 km end

    });

    // distance check for default address start

    $(document).on('click','.radioButton',function(){

         var chefId = localStorage.chef_id;
         var type = 'default';

         $.ajax({
             url: "{{URL::to('checkDistance')}}",
             type: "POST",
             data: {
                 "_token": "{{ csrf_token() }}",
                 "chefId": chefId,
                 "type":type
             },
             success: function(result) {
                if(result > 10){
                  event.preventDefault();
                  swal('Area is not within delivery range,Please select another address');
                  $('.radioButton').prop('checked',false);
                  $('#savedAddress').val(null);
                   }
                 }
               });
             });

    // distance check for default address end

    $(document).on('click','.paymentButton',function(){  // if user click on payment option at time saved card div disable
        $('.paymentButton').prop('disabled',false);
        $(".savedButton").children().prop("disabled",true);
        $('.cardId').prop('checked',false);
        $('#selectedCardId').val(null);
    });

    $(document).on('click','.savedButton',function(){  // if user click on saved payment option at time new payment div disable
        $('.savedButton').prop('disabled',false);
        $(".paymentButton").children().prop("disabled",true);
        $('.card-number').val(null);
        $('.card-cvc').val(null);
        $('.card-expiry-month').val(null);
        $('.card-expiry-year').val(null);
    });

    $(document).on('change','.cardId',function(){
        $('#selectedCardId').val($(this).data('card'));
    });

    // set value of all inputs when user select saved card payment start

      // get order suggestion
        $(document).on('change','#order_suggetion',function(){
            $('#savedOrderSuggetion').val($(this).val());
        });

      // get order address
        $(document).on('change','.radioButton',function(){
            $('#savedAddress').val($(this).val());
        });

      // get order schedule date
        $(document).on('change','#daysdropdown',function(){
            $('#savedDate').val($(this).val());
        });

      // get order schedule time
        $(document).on('change','#input-time',function(){
            $('#savedTime').val($(this).val());
        });

    // set value of all inputs when user select saved card payment end

    function checkoutCartData() {
        var cart = localStorage.cartdata;
        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = new Array();
        }

        var html = '';
        var totalqty = 0;
        var totalprice = 0;

        if (cart.length > 0) {
            $.each(cart, function (i, item) {
                var value = item[0];
                var addonstatus = value.addonstatus;
                if(value.prodtype == 2)
                {
                  $.ajax({
                      url: "{{URL::to('get-product-timing')}}",
                      type: "POST",
                      data: {
                          "_token": "{{ csrf_token() }}",
                          "id": value.id

                      },
                      success: function (itemtiming) {
                          //console.log(itemtiming);
                          var dhtml='';
                          var dropdowndata = itemtiming.data;
                          dhtml +='<select name="schedule_date" id="daysdropdown" class="form-control">';
                          dhtml +='<option selected>Select Day</option>';
                          for(var i in dropdowndata)
                          {
                             var obj = dropdowndata[i];
                             //console.log(obj);
                             dhtml +='<option starttime="'+obj.start+'" endtime="'+obj.close+'" avidate="'+obj.available_date+'" value="'+obj.day+'/'+obj.available_date+'">'+obj.day+'-'+obj.available_date+'</option>';
                          }

                          dhtml +='</select>';
                          $('#daysdropdowndata').html(dhtml);
                          $('select').niceSelect();
                      }

                  });
                    $('#Itemtimingslotday').show();

                }
                else {
                    $('#Itemtimingslotday').hide();

                }


                if(addonstatus != false)
                {
                    var ad = value.adonsname;
                    var ap = value.adprice;

                    html += '<div class="media"><div class="mr-3 checkout-img"><img class="img-fluid rounded" src="' + value.image + '" alt="">' +
                    '</div><div class="media-body"><h5 class="mt-0 mb-0">' + value.name + '</h5>' +
                    '<div class="prise-cart">$' + value.price + '</div>';
                    html +='<h5 class="mt-0 mb-0">-Addons</h5>';
                    if (ad.indexOf(',') > -1) {
                        //string.split(',')
                        var addonsdata = ad.split(",");
                        var addonsprice = ap.split(",");
                        for(var j in addonsdata)
                        {
                            var addonsobj = addonsdata[j];
                            var addonprice = addonsprice[j];
                            html+='<div class="col-12"><div class="col-6 pull-left"><span>'+addonsobj+'</span></div><div class="col-6 pull-left text-right"><span>$'+addonprice+'</span></div></div>';
                        }
                    }else{
                        html+='<div class="col-12"><div class="col-6 pull-left"><span>'+ad+'</span></div><div class="col-6 pull-left text-right"><span>$'+ap+'</span></div></div>';
                    }

                    html+='<h5 class="mt-2 pt-2 mb-0">Item suggestions</h5><textarea placeholder="please write here..."  class="form-control suggestions-text" rows="3">'+value.itemsuggestions+'</textarea>';
                    html +='</div><div class="input-group"> <span class="input-group-btn">' +
                    '<button type="button" class="quantity-left-minus btn-number" id="qtyminus" data-type="minus" data-field="" data-id="' + value.tmpid + '">-</button>' +
                    '</span><input type="text" id="quantity" name="quantity" class="form-control input-number" value="' + value.qty + '" min="1" max="20">' +
                    '<span class="input-group-btn"><button type="button" class="quantity-right-plus btn-number" id="qtyplus" data-type="plus" data-field="" data-id="' + value.tmpid + '">+</button>' +
                    '</span></div><div class="delet delete_item" id="cartdelete" data-id="' + value.tmpid + '"><i class="fa fa-trash" aria-hidden="true"></i></div></div>';

                }else{
                    html += '<div class="media"><div class="mr-3 checkout-img"><img class="img-fluid rounded" src="' + value.image + '" alt="">' +
                    '</div><div class="media-body"><h5 class="mt-0 mb-0">' + value.name + '</h5>' +
                    '<div class="prise-cart">$' + value.price + '</div>';
                    html+='<h5 class="mt-2  mb-0">Item suggestions</h5><textarea placeholder="please write here..."  class="form-control suggestions-text" rows="3"></textarea>';
                    html+='</div><div class="input-group"> <span class="input-group-btn">' +
                    '<button type="button" class="quantity-left-minus  btn-number" id="qtyminus" data-type="minus" data-field="" data-id="' + value.tmpid + '">-</button>' +
                    '</span><input type="text" id="quantity" name="quantity" class="form-control input-number" value="' + value.qty + '" min="1" max="20">' +
                    '<span class="input-group-btn"><button type="button" class="quantity-right-plus btn-number" id="qtyplus" data-type="plus" data-field="" data-id="' + value.tmpid + '">+</button>' +
                    '</span></div><div class="delet delete_item" id="cartdelete" data-id="' + value.tmpid + '"><i class="fa fa-trash" aria-hidden="true"></i></div></div>';

                }
                totalprice += value.qty * value.price;
            });
            var deliverycharge = {!! $deliveryCharge !!};
            var fulltotal = totalprice + deliverycharge;
            $('.deliverycharge').text(deliverycharge.toFixed(2));
            $('.cart-total').text(totalprice.toFixed(2));
            $('.fulltotal').text(fulltotal.toFixed(2));
            $('.checkout_data').html(html);

        } else {
            $('#media').replaceWith('<div class="media text-center">No Item Found.</div>');
            $('.cart-total').text(0.00);
            $('.deliverycharge').text(0.00);
            $('.fulltotal').text(0.00);
            $('#Itemtimingslotday').hide();
            $('.checkout_data').html(html);



        }
    }


    function deletecart(id) {

    var cart = localStorage.cartdata;

    if (cart) {
        cart = JSON.parse(cart);
    } else {
        cart = new Array();
    }

    var totalqty = 0;
    var totalprice = 0;

    for (var i = 0; i < cart.length; i++) {
        var cart_id = cart[i][0]['tmpid'];
        if (cart_id === id) {
            delete cart[i];
        }
    }

    var filtered = cart.filter(function (el) {
        return el != null;
    });

    localStorage.cartdata = JSON.stringify(filtered);
    setCookie("cartdata", JSON.stringify(cart), 15);
    checkoutCartData();
    cartData();

}
function qtyminus(id) {
    var cart = localStorage.cartdata;
    if (cart) {
        cart = JSON.parse(cart);
    } else {
        cart = new Array();
    }

    var totalqty = 0;
    var totalprice = 0;

    for (var i = 0; i < cart.length; i++) {
        var cart_id = cart[i][0]['tmpid'];
        if (cart_id === id) {
            cart[i][0]['qty'] = cart[i][0]['qty'] - 1;
        }
        if (cart[i][0]['qty'] == 0) {
            delete cart[i];
        } else {
            totalqty += cart[i][0]['qty'];
            totalprice += cart[i][0]['qty'] * cart[i][0]['price'];
        }

    }

    var filtered = cart.filter(function (el) {
        return el != null;
    });

    localStorage.cartdata = JSON.stringify(filtered);
    setCookie("cartdata", JSON.stringify(cart), 15);
    checkoutCartData();
    cartData();
}

function qtyplus(id) {
    var cart = localStorage.cartdata;

    if (cart) {
        cart = JSON.parse(cart);
    } else {
        cart = new Array();
    }

    var totalqty = 0;
    var totalprice = 0;

    for (var i = 0; i < cart.length; i++) {

        var cart_id = cart[i][0]['tmpid'];
        if (cart_id === id) {
            cart[i][0]['qty'] = cart[i][0]['qty'] + 1;
        }
        totalqty += cart[i][0]['qty'];
        totalprice += cart[i][0]['qty'] * cart[i][0]['price'];
    }

    localStorage.cartdata = JSON.stringify(cart);
    setCookie("cartdata", JSON.stringify(cart), 15);
    checkoutCartData();
    cartData();
}
$(document).on('click', '#cartdelete', function () {
        var result = confirm("Are you sure to delete this product?");
        if (result) {
            var id = $(this).data('id');
            deletecart(id);
        }

    });
    $(document).on('click', '#qtyplus', function () {
        var id = $(this).data('id');
        qtyplus(id);
    });

    $(document).on('click', '#qtyminus', function () {
        var id = $(this).data('id');
        qtyminus(id);
    });

    $(document).on('change','#daysdropdown',function(){
      $('#timepicker').show();
      var start = $('option:selected', this).attr('starttime');
      var close = $('option:selected', this).attr('endtime');
      var avidate = $('option:selected', this).attr('avidate');

      $("#dtBox").DateTimePicker({
        mode: "time",
        timeMeridiemSeparator: " ",
        timeFormat: "hh:mm AA",
        maxTime: close,
        minTime: start,
        init: function()
				{
					var oDTP = this;
					oDTP.setDateTimeStringInInputField();
				}
      });

    });
    </script>

@endsection
