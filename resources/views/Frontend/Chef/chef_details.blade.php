@extends('layouts.frontend')
@section('front_title') Chef Details @endsection
@section('front_css')
@endsection
@section('content')
    <section class="chef-header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="media">
                        <div class="chef-profil-img">
                            <img class="mr-3 le img-fluid" src="{{URL::to('public/upload/user/'.$user->profile_img)}}"
                                 alt="">
                        </div>
                        <div class="media-body">
                            <h3 class="mt-0 mb-0 text-white">{{$user->name}}</h3>
                            <ul class="mt-0 mb-0 chef-city">
                                @foreach($user['cusines'] as $row)
                                    <li>{{$row}}</li>
                                @endforeach
                            </ul>
                            <p class="mt-0 mb-0  text-white address-chef">{{$user->address}}</p><a class="more-btn" data-toggle="modal" data-target="#chefProfile">More about My Self</a>
                          </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <ul class="ml-auto check-reviews text-">
                        <li><span class="valu-rmp"><i class="fa fa-star" aria-hidden="true"></i> 4.5</span> <span
                                class="text-rdc">458+ Reviews</span></li>
                        <li class="cross"><img src="{{URL::to('public/Frontassets/images/cross.svg')}}" alt=""></li>
                        <li><span class="valu-rmp">25 min</span> <span class="text-rdc">Delivery Time</span></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="all-cuisines section-gapping">
        <div id="loading" class="chef_section" style="display: none">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>

                </div>
            </div>

        </div>
        <div class="container">
            <div class="bd-example bd-example-tabs">
                <div class="row ">
                    <div class="col-12">
                        <div class="tab-content cuisines-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="popular" role="tabpanel"
                                 aria-labelledby="v-pills-home-tab">
                                <h4>ON DEMAND</h4>
                                <div class="row">
                                    @forelse($ondemand as $item)

                                        <div class="col-md-3">
                                            <div class="product-box">

                                                <div class="product-img progressive">
                                                    @if($item->is_favorite == '1')
                                                        <div class="favorites remove_to_fav" data-id="{{$item->id}}"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                    @else
                                                        <div class="favorites add_to_fav" data-id="{{$item->id}}"> <i class="fa fa-heart-o" aria-hidden="true"></i> </div>
                                                    @endif
                                                    <div class="min-delivery right ">
                                                        <img src="{{URL::to('public/Frontassets/images/scooter.png')}}"
                                                             width="10"
                                                             alt=""> {{$item->item_preparation_time}} min
                                                    </div>
                                                    {{--<div class="bestseller">BESTSELLER</div>--}}
                                                    <img src="{{URL::to('public/upload/item/'.$item->item_image)}}"
                                                         class="progressive__img progressive--not-loaded img-fluid"
                                                         alt=""></div>
                                                <div class="product-info">
                                                    <h6>{{$item->item_name}}</h6>
                                                    <p class="text-grey">{{substr($item->item_description,0,50)}}</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <!--<div class="prise">${{$item->item_price}}</div>-->
                                                            <div class="prise">${{$item->finalprice}}</div>
                                                        </div>
                                                       @if($item->open_status == 'open')
                                                        <div class="col-6">

                                                                <a class="pluse ml-auto text-white add_cart"
                                                                   data-id="{{$item->id}}"
                                                                   data-addonstatus = "0"
                                                                   data-name="{{$item->item_name}}"
                                                                   data-image="{{URL::to('public/upload/item/'.$item->item_image)}}"
                                                                   data-category="{{@$row->categoryData->category_name}}"
                                                                   data-price="{{$item->finalprice}}"
                                                                   data-addonscount ="{{$item->addonscount}}"
                                                                   data-prodtype ="1"
                                                                   data-chef="{{$item->chef_id}}">+</a>

                                                        </div>

                                                        @else
                                                            <b>Not available</b>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12 text-center"> No Item Found.</div>
                                    @endforelse
                                </div>
                                <h4>SCHEDULED</h4>
                                <div class="row">
                                    @forelse($schdeule as $item)
                                        <?php //echo "<pre>"; print_r($item); ?>
                                        <div class="col-md-3">
                                            <div class="product-box">
                                                <div class="product-img progressive">
                                                    @if($item->is_favorite == '1')
                                                        <div class="favorites remove_to_fav" data-id="{{$item->id}}"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                    @else
                                                        <div class="favorites add_to_fav" data-id="{{$item->id}}"> <i class="fa fa-heart-o" aria-hidden="true"></i> </div>
                                                    @endif
                                                    <div class="dropdown">
                                                        <button class="min-delivery chef-op dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="fa fa-clock-o " aria-hidden="true"></i> {{$item->day}} - {{$item->open_timing}}<i class="fa fa-info-circle ml-2" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu delivery-dropdown" aria-labelledby="dropdownMenuButton">
                                                          @forelse($item->itemtimedata as $time)

                                                            @if($time->status == 'open')

                                                            <a class="dropdown-item" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$time->day}}. {{ Carbon\Carbon::parse($time->open)->format('g:i A') }} - {{ Carbon\Carbon::parse($time->close)->format('g:i A') }}</a>
                                                            @endif
                                                          @empty
                                                          @endforelse

                                                        </div>
                                                    </div>
                                                    <!--<div class="min-delivery chef-op">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        {{$item->day}} - {{$item->open_timing}}
                                                        <ul>
                                                            @forelse($item->itemtimedata as $time)

                                                              @if($time->status == 'open')
                                                              <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$time->day}}. {{ Carbon\Carbon::parse($time->open)->format('g:i A') }} - {{ Carbon\Carbon::parse($time->close)->format('g:i A') }}</li>
                                                              @endif
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    </div>-->
                                                    {{--<div class="bestseller">BESTSELLER</div>--}}
                                                    <img src="{{URL::to('public/upload/item/'.$item->item_image)}}"
                                                         class="progressive__img progressive--not-loaded img-fluid"
                                                         alt=""></div>
                                                <div class="product-info">
                                                    <h6>{{$item->item_name}}</h6>
                                                    <p class="text-grey">{{substr($item->item_description,0,50)}}</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <!--<div class="prise">${{$item->item_price}}</div>-->
                                                            <div class="prise">${{$item->finalprice}}</div>
                                                        </div>
                                                        @if($item->open_status == 'open')
                                                        <div class="col-6">

                                                                <a class="pluse ml-auto text-white add_cart"
                                                                   data-id="{{$item->id}}"
                                                                   data-addonstatus = "0"
                                                                   data-name="{{$item->item_name}}"
                                                                   data-image="{{URL::to('public/upload/item/'.$item->item_image)}}"
                                                                   data-category="{{@$row->categoryData->category_name}}"
                                                                   data-price="{{$item->finalprice}}"
                                                                   data-addonscount ="{{$item->addonscount}}"
                                                                   data-prodtype ="2"
                                                                   data-chef="{{$item->chef_id}}">+</a>

                                                        </div>

                                                        @else
                                                            <b>Not available at this Time</b>
                                                        @endif
                                                        <!--<div class="col text-right ">
                                                            @if($item->open_status == 'open')
                                                                <a class="pluse ml-auto text-white item_details_pop"
                                                                   data-id="{{$item->id}}">+</a>
                                                            @else
                                                                <b>Not available at this Time</b>
                                                            @endif
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <div class="col-md-12 text-center"> No Item Found.</div>
                                        @endforelse
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="readyorder section-gapping">
        <div class="container">
            <h2 class="title text-white text-center">Ready for <b>your Order</b></h2>
            <form class="youorder">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <input class="form-control" name="address" type="text" id="address"
                               placeholder="Select your Current Location">
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lang" id="lang">
                        <input type="submit" class="search-button" value="Search"></div>
                </div>
            </form>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="item_details" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body" id= "addtocartpopup">
                  <button type="button" onclick="resetaddtocart()" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <input type="hidden" id="addtocatstatus"/>
                  <input type="hidden" id="productprice"/>
                  <input type="hidden" id="addonsprice"/>
                    <div class="row">
                        <div class="col-md-5 text-center">
                            <div class="product-img progressive">
                                <img src="{{URL::to('public/upload/item/item-5cab12452ca4a.jpg')}}"
                                     class="progressive__img img-fluid progressive--is-loaded" id="item_images" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2 id="item_name">Desert Item1</h2>
                            <p id="item_description">Many desktop publishing packages and web page edit</p>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="prise">$<span class="item_price" id="item_price">299.99</span></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                            <div class="col-md-12">
                                <textarea id="itemsuggestions" placeholder="Please Write Item suggestions Here" class="form-control"></textarea>
                            </div>

                            </div>

                        </div>

                    </div>
                    <div class="row mt-4 text-center extra_choise">
                        <div class="col-sm-12">
                            <h5>Extra Choise</h5>
                        </div>
                    </div>
                    <div class="extra-titl pb-4 mt-3">
                        <div class="adons">
                            <h5 class="addon-title">Here are some addons*</h5>
                            <div class="d-flex justify-content-between d-flex-wrap mb-2">
                                <div class="addon-check">
                                    <input type="checkbox" name="" value="10" class="" id="option0" data-id="1">
                                    <label for="option0">Iced Coffee</label>
                                </div>
                                <div class="addon-price">$1.00</div>
                            </div>
                            <div class="d-flex justify-content-between d-flex-wrap mb-2">
                                <div class="addon-check">
                                    <input type="checkbox" name="" value="10" class="" id="option1" data-id="1">
                                    <label for="option1">Iced Coffee</label>
                                </div>
                                <div class="addon-price">$1.00</div>
                            </div>
                            <div class="d-flex justify-content-between d-flex-wrap mb-2">
                                <div class="addon-check">
                                    <input type="checkbox" name="" value="10" class="" id="option2" data-id="1">
                                    <label for="option2">Iced Coffee</label>
                                </div>
                                <div class="addon-price">$1.00</div>
                            </div>
                            <div class="d-flex justify-content-between d-flex-wrap mb-2">
                                <div class="addon-check">
                                    <input type="checkbox" name="" value="10" class="" id="option3" data-id="1">
                                    <label for="option3">Iced Coffee</label>
                                </div>
                                <div class="addon-price">$1.00</div>
                            </div>
                        </div>

                    </div>
                    <div class="text-center" id="addtocartbtn">
                        <button class="btn continue-btn m-auto bg-green text-center add_cart">Add to Cart - $<span id="amount">4.95</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chef Profile Modal Start -->

    <div class="modal fade" id="chefProfile"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">{{$user->name}} Details</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              @if($chefDetails)
              <div class="row">
              <div class="col-md-12">
                  Experience : {{$chefDetails->year_of_experience}}
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  Restaurant Name: {{$chefDetails->resturant_name}}
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  Chef Specialities : {{$chefDetails->specialities}}
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  About Chef : {{$chefDetails->about_chef}}
              </div>
            </div>
              @else
              <div class="col-md-12">
                    <h3>No More Details Available....</h3>
              </div>
              @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Chef Profile Modal End -->
@endsection
@section('front_js')
    <script
        src="https://maps.googleapis.com/maps/api/js?input=Mexico&types=geocode&libraries=places&key=AIzaSyDb5KGfWAckxCGpoBYfAxNvPuiez5r_rJw"
        type="text/javascript"></script>
    <script type="text/javascript">

        function initializer() {
            var input1 = document.getElementById('address');
            var autocomplete1 = new google.maps.places.Autocomplete(input1);
            autocomplete1.setComponentRestrictions(
                {'country': ['MX']});
            google.maps.event.addListener(autocomplete1, 'place_changed', function () {
                var place = autocomplete1.getPlace();
                if (!place.geometry) {
                    window.alert("Service not provided on this location : '" + place.name + "'");
                    $('#address').val('');
                    $('#lat').val('');
                    $('#lang').val('');
                    return;
                }
                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lang').value = place.geometry.location.lng();
            });
        }

        google.maps.event.addDomListener(window, 'load', initializer);

        setTimeout(function () {
            $('.all-cuisines .progressive--not-loaded').addClass('progressive--is-loaded').removeClass('progressive--not-loaded');
        }, 1800);
    </script>
    <script type="text/javascript">
        $(document).on('click','.add_to_fav',function(){
            var itemid = $(this).data('id');

            var current = $(this);
            $.ajax({
                url: "{{URL::to('auth/check')}}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",

                },
                success: function (data) {
                    if(data == 1)
                    {

                        $.ajax({
                            url : "{{URL::to('add-to-favrioute')}}",
                            type : "POST",
                            data : {
                                "_token": "{{ csrf_token() }}",
                                "item_id" : itemid,
                                "type" : 1
                            },
                            success : function(response){
                                console.log(response);
                                if(response.status == true)
                                {
                                    $(current).removeClass('add_to_fav');
                                    $(current).parent().find('.fa-heart-o').removeClass('fa-heart-o').addClass('fa-heart');
                                    $(current).addClass('remove_to_fav');

                                    swal("success!", response.msg, "success");

                                }else{
                                    swal("Alert", response.msg, "warning");
                                }
                            }
                        });
                    }
                    else
                    {
                        swal("Alert", "login is required for add item to favorites!", "warning");
                        return false;
                    }
                }

            });

        });
        $(document).on('click','.remove_to_fav',function(){
            var itemid = $(this).data('id');

            var current = $(this);
            $.ajax({
                url: "{{URL::to('auth/check')}}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",

                },
                success: function (data) {
                    if(data == 1)
                    {

                        $.ajax({
                            url : "{{URL::to('add-to-favrioute')}}",
                            type : "POST",
                            data : {
                                "_token": "{{ csrf_token() }}",
                                "item_id" : itemid,
                                "type" : 2
                            },
                            success : function(response){
                                console.log(response);
                                if(response.status == true)
                                {
                                    $(current).removeClass('remove_to_fav');

                                    $(current).parent().find('.fa-heart').removeClass('fa-heart').addClass('fa-heart-o');
                                    $(current).addClass('add_to_fav');

                                    swal("success!", "Your item is removed from favorite.", "success");

                                }else{
                                    swal("Alert", response.msg, "warning");
                                }
                            }
                        });
                    }
                    else
                    {
                        swal("Alert", "login is required for remove item from favorites!", "warning");
                        return false;
                    }
                }

            });

        });

    </script>
    <script>
            $(document).on('click','.subadons_data',function () {
                console.log($(this).prop('type'));
                var boxtype = $(this).prop('type');
                let a = [];
                let b = [];
                let name = [];
                var price = Number($('#item_price').text());

                $(".subadons_data:checked").each(function () {
                    a.push($(this).data('price'));
                    b.push($(this).data('value'));
                    name.push($(this).data('name'));
                });

                var qty = 1;
                var sum = 0;
                a.forEach(function(num){sum+=parseFloat(num) || 0;});

                var adons = b.join(',');
                var adons_price = a.join(',');
                var adons_name = name.join(',');

                price +=  Number(sum);
                var final_price = qty * price;
                var total_price = Number($('.total_order_price').text());
                total_price +=  Number(final_price);

                $('#amount').text(total_price);

                $('#addonsprice').val(adons_price);
                $('#productprice').val(total_price);
                $('.add_cart2').attr({'data-price':total_price,'data-adons':adons,'data-adprice':adons_price,'data-adonsname':adons_name,'data-addonstatus':1});

            });
    </script>
@endsection
