@extends('layouts.frontend')
@section('front_title') My Account @endsection
@section('front_css')
@endsection
@section('content')
@if(Session::has('message'))
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! session('message') !!}
	</div>
@endif
@if(!empty($errors->all()))
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
      <span> {{ $error }} </span></br>
    @endforeach
  </div>
@endif
    <section class="order-hd mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav tabs-left bg-white flex-column nav-pills account_tab" id="v-pills-tab"
                         role="tablist"
                         aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                           role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-users"
                                                                                           aria-hidden="true"></i>
                            Profile</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#orders"
                           role="tab" aria-controls="orders" aria-selected="false"><i
                                class="fa fa-shopping-bag" aria-hidden="true"></i> Orders</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#favorite"
                           role="tab" aria-controls="favorite" aria-selected="false"><i class="fa fa-heart"
                                                                                        aria-hidden="true"></i>
                            My favorites</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#addresstabs" role="tab"
                           aria-controls="addresstabs" aria-selected="false"><i class="fa fa-map-marker"
                                                                                aria-hidden="true"></i>
                            Addresses</a>
												<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#cardtabs" role="tab"
                           aria-controls="cardtabs" aria-selected="false"><i class="fa fa-credit-card" aria-hidden="true"></i>
                            Saved Cards</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content bg-white p-3" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="panel-heading">
                                 <div class="row">
                                        <div class="col-md-6">  <h5 class="text-white">Profile</h5></div>
                                        <div class="col-md-6 text-right"><button class="btn-red p-2 rounded" data-toggle="modal" data-target="#profile-edit">Edit</button></div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 bg-white">
                                    <div class="panel panel-default w-100 mb-4 mt-3">

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            @if(file_exists(public_path('upload/user/'.Auth::user()->profile_img)) && Auth::user()->profile_img != '')
                                                                <img
                                                                    src="{{URL::to('public/upload/user/'.Auth::user()->profile_img)}}"
                                                                    class="img-fluid" alt="user">
                                                            @else
                                                                <img
                                                                    src="{{URL::to('public/default/placeholder.jpg')}}"
                                                                    class="img-fluid"
                                                                    alt="user">
                                                            @endif
                                                        </div>
                                                        <div class="col-md-8">
                                                            <ul class="address-list">
                                                                <li><span>Email</span> {{Auth::user()->email}}</li>
                                                                <li><span>Name</span> {{Auth::user()->name}}</li>
                                                                <li>
                                                                    <span>Mobile Number</span> {{Auth::user()->phone_number}}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">
                            <div class="panel-heading">
                                <h5 class="text-white">Order</h5>
                            </div>
                            <div class="row justify-content-center">

                                <div class="col-md-12 col-lg-12 ">
																		@forelse($order as $orders)
																			@foreach($orders->orderItem as $keys => $values)
                                    <div class="row no-gutters mb-3">
                                        <div class="col-md-12 order-header mb-3 ">
                                            <div class="row  pl-3 pr-3">
                                                <div class="col-md-6">
                                                    <p class="bg-white p-2">{{$orders->order_number}}</p>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <lable class="btn-red rounded p-2">{{$orders->order_status}}</lable>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="media">
																											<a href="{{URL::to('chef/'.strtolower(str_replace(' ','-',@$orders->chefData->name)))}}">
                                                        <div class="order-img-past mr-3">
                                                            <img class="img-fluid rounded"
                                                                 src="{{URL::to('public/upload/item/'.$values->itemData->item_image)}}"
                                                                 alt="">
																												</div>
																											</a>
                                                        <div class="media-body">
                                                            <h4 class="mb-2">{{$values->itemData->item_name}}</h4>
                                                            <h5 class="mt-0 mb-0">{{$orders->orderItem[0]->adons_name}}</h5>
                                                            <p class="mb-1">{{$values->itemData->item_description}}</p>
                                                            <div class="prise-cart">${{$values->item_price}}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-md-6 text-right">Delivered on {{$orders->updated_at->setTimezone('-5')->format('D, F d Y')}}</div> -->
                                                <!-- <div class="col-md-3"><i class="fa fa-star" aria-hidden="true"></i> Rate
                                                    & Review Product
                                                </div> -->
                                            </div>
                                        </div>

                                        <div class="col-md-12 border-top mt-3 pt-3">
                                            <div class="row">
                                                <div class="col-md-6"><p>Ordered On {{$orders->updated_at->setTimezone('-5')->format('D, F d Y')}}</p></div>
                                                <div class="col-md-6 text-right">
                                                    <div><b>Order Total ${{$orders->order_final_total}}</b></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
																		@endforeach
																		@empty
																		 <div class="col-12 text-center">No Order Found.</div>
																		@endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="favorite" role="tabpanel"
                             aria-labelledby="v-pills-messages-tab">
                            <div class="panel-heading">
                                <h5 class="text-white">My favorites</h5>
                            </div>
                            <div class="bestdishes">
                                <div class="row">
                                    @forelse($favorite as $row)
                                        <div class="col-md-4">
                                            <a href="{{URL::to('chef/'.strtolower(str_replace(' ','-',@$row->chefData->name)))}}">
                                                <div class="bestdishes-box" id="bestdishes-box">
                                                    <div class="bestdishes-img">
                                                        <div class="min-delivery">{{$row->item_preparation_time}}min
                                                        </div>
                                                        <img src="{{URL::to('public/upload/item/'.$row->item_image)}}"
                                                             class="img-fluid" alt="">
                                                        <div class="favorites remove_to_fav" data-id="{{$row->id}}"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                    </div>
                                                    <div class="bestdishes-info">
                                                        <h6>{{$row->item_name}}</h6>
                                                        <p class="text-grey">{{@$row->categoryData->category_name}}</p>
                                                        <div class="row align-items-center">
                                                            <div class="col-6">
                                                                <div class="review-box"><span
                                                                        class="icon-star _537e4"></span><span>4.3</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 text-right ">
                                                                <div class="prise">${{$row->item_price}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                        <div class="col-md-12 text-center">No Favorite Item Found.</div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="addresstabs" role="tabpanel"
                             aria-labelledby="v-pills-settings-tab">
                            <div class="panel-heading">
                                <div class="row">
                                        <div class="col-6"><h5 class="text-white">Manage Addresses</h5> </div>
                                        <div class="col-6 text-right">
                                        <button class="btn-red p-2 rounded" data-toggle="modal" data-target="#add-address">Add Address</button></div>
                                    </div>
                            </div>
                            <div class="row">
                                @forelse($userAddress as $row)
                                <div class="col-md-6">
                                    <div class="address-box">
                                        <h4><i class="fa {{$row->type == 'home'? 'fa-home' : ($row->type == 'work' ? 'fa-briefcase' : 'fa-map-marker')}}" aria-hidden="true"></i> {{$row->type}}</h4>
                                        <address>
																					<p>{{$row->name}}</p>
																					<p>{{$row->address}} @if($row->address2),{{$row->address2}}@endif</p>
																					<p>{{$row->landmark}}</p>
																					<p>{{$row->city}},{{$row->zipcode}}</p>
																					<p>{{$row->contact_no}}</p>
                                        </address>
                                        <ul class="list">
                                            <li>
                                              <a href="javascript:void(0);" onclick="editaddress('{{$row->id}}','{{$row->name}}','{{$row->type}}','{{$row->address}}','{{$row->address2}}','{{$row->city}}','{{$row->zipcode}}','{{$row->contact_no}}','{{$row->landmark}}')" class="btn-red p-2 rounded">Edit</a>

                                            </li>
                                            <li>

                                                <form method="post" action="{{URL::to('addupdateaddress')}}" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                                    @csrf
                                                    <input type="hidden" value="{{$row->id}}" name="editid">
                                                    <input type="hidden" value="3" name="addform">
                                                    <button type="submit" class="btn p-2 rounded">Delete</button>
                                                </form>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @empty
                                    <div class="col-md-12 text-center">No Address Found.</div>
                                    @endforelse
                            </div>
                        </div>
												<!-- saved card listing start -->
												<div class="tab-pane fade" id="cardtabs" role="tabpanel"
														 aria-labelledby="v-pills-settings-tab">
														<div class="panel-heading">
																<div class="row">
																	<div class="col-6"><h5 class="text-white">Manage Saved Cards</h5> </div>
																</div>
														</div>
														<div class="card-list">
																@forelse($savedCard as $card)

																		<div class="card-box">
																				<address>
																					<p class="card-num">xxxx-xxxx-xxxx-{{$card->card_number}}</p>
																							<p class="master-card">{{$card->card_type}}</p>
																						<p class="card-date">{{$card->expiry_date}}</p>
																				</address>
																				<ul class="list">
																						<li>
																								<form method="post" action="{{URL::to('deleteSavedCard')}}" onsubmit="return confirm('Are you sure you want to delete this card?');">
																										@csrf
																										<input type="hidden" value="{{$card->id}}" name="cardId">
																										<button type="submit" class="btn p-2 rounded">Delete</button>
																								</form>
																						</li>
																				</ul>
																		</div>

																@empty
																	<div class="col-md-12 text-center">No Cards Found.</div>
																@endforelse
														</div>
												</div>
												<!-- saved card listing end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- Modal -->
 <div class="modal fade myaccount-modal" id="edit-address" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" action="{{URL::to('addupdateaddress')}}">
            @csrf
            <input type="hidden" value="2" name="addform">
            <input type="hidden" name="editid" id="editid">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <input type="text" class="form-control" id="name" required="required" name="name" placeholder="Name">
                            </div>

                      </div>
                      <div class="form-row">

                          <div class="form-group col-md-12">
                              <input type="text" class="form-control" id="address" required="required" name="address" placeholder="Address Line 1"> </div>
                          <div class="form-group col-md-12">
                              <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2"> </div>
                          <div class="form-group col-md-12">
                              <input type="text" class="form-control" id="contactnumber"  required="required" name="contactnumber" placeholder="Contact number "> </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="zipcode" required="required" name="zipcode" placeholder="ZIP Code"> </div>
                          <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="city" required="required" name="city" placeholder="City"> </div>
                      </div>
	                    <div class="form-row mb-3">
	                        <div class="col">
	                        <select id="eaddresstype" class="form-control" required="required" name="addresstype">
	                            <option value="" selected>Choose Address Type</option>
	                            <option value="home">Home</option>
	                            <option value="work">Work</option>
	                            <option value="other">Other</option>
	                        </select>
	                        </div>
	                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <input type="text" id="landmark" required="required" name="landmark" placeholder="landmark" class="form-control"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="modal fade myaccount-modal" id="add-address" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" action="{{URL::to('addupdateaddress')}}">
            @csrf
            <input type="hidden" value="1" name="addform">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                  <div class="form-row">
                      <div class="form-group col-md-12">
                          <input type="text" class="form-control" required="required" name="name" placeholder="Name">
                        </div>

                  </div>
                  <div class="form-row">

                      <div class="form-group col-md-12">
                          <input type="text" class="form-control" required="required" name="address" placeholder="Address Line 1"> </div>
                      <div class="form-group col-md-12">
                          <input type="text" class="form-control" name="address2" placeholder="Address Line 2"> </div>
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
                        <div class="col">
                        <select id="inputState" class="form-control" name="addresstype" required="required">
                            <option value="" selected>Choose Address Type</option>
                            <option value="home">Home</option>
                            <option value="work">Work</option>
                            <option value="other">Other</option>

                        </select>
                        </div>
                    </div>
                    <!--<div class="form-row mb-3">
                        <div class="col">
                            <textarea name="address" id="" class="form-control" rows="10"></textarea>
                        </div>
                    </div>-->
                    <div class="form-row mb-3">
                        <div class="col">
                            <input type="text" name="landmark" required="required" placeholder="landmark" class="form-control"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="modal fade myaccount-modal" data-keyboard="false" data-backdrop="static" id="profile-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" action="{{URL::to('update-profile')}}" enctype="multipart/form-data">
            @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">

                        <div class="avatar-wrapper-profile">
                            @if(file_exists(public_path('upload/user/'.Auth::user()->profile_img)) && Auth::user()->profile_img != '')

                                    <img class="profile-pic" src="{{URL::to('public/upload/user/'.Auth::user()->profile_img)}}" alt="" />
                            @else
                                    <img src="{{URL::to('public/default/placeholder.jpg')}}" class="profile-pic" alt="user" />
                            @endif

                            <div class="upload-button">Change Images</div>
                            <input class="file-upload" type="file" name="profile_img" accept="image/*" /> </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <input type="email" placeholder="Email" name="email" class="form-control" value="{{Auth::user()->email}}"> </div>
                        </div>
                        <!--<div class="form-row mb-3">
                            <div class="col">
                                <input type="password" placeholder="Password" class="form-control"> </div>
                        </div>-->
                        <div class="form-row mb-3">
                            <div class="col">
                                <input type="text" placeholder="Name" name="name" class="form-control" value="{{Auth::user()->name}}"> </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <input type="text" placeholder="Mobile Number" name="phone_number" class="form-control" value="{{Auth::user()->phone_number}}"> </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
        </form>
    </div>
<!-- end -->

@endsection
@section('front_js')
    <script>
        function deleteaddress(id)
        {
            var check = confirm("Are you sure you want to delete?");
            if(check)
            {
                        $.ajax({
                            url : "{{URL::to('add-to-favrioute')}}",
                            type : "POST",
                            data : {
                                "_token": "{{ csrf_token() }}",
                                "editid" : id,
                                "addform" : 3
                            },
                            success : function(response){
                                console.log(response);
                                if(response.status == true)
                                {

                                    swal("success!", "Your item is removed from favorite.", "success");
                                    setTimeout(function(){
                                        window.location.reload();
                                    }, 300);



                                }else{
                                    swal("Alert", response.msg, "warning");
                                }
                            }
                        });
            }
        }

        function editaddress(id,name,type,address,address2,city,zipcode,contact_no,landmark)
        {

               $('#editid').val(id);
               $('#name').val(name);
                $('#eaddresstype').val(type);
                $('#address').val(address);
                $('#address2').val(address2);
                $('#city').val(city);
                $('#zipcode').val(zipcode);
                $('#zipcode').val(zipcode);
                $('#contactnumber').val(contact_no);
                $('#landmark').val(landmark);
                $('select').niceSelect('update');
                $('#edit-address').modal('show');
        }
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

                                    swal("success!", "Your item is removed from favorite.", "success");
                                    setTimeout(function(){
                                        window.location.reload();
                                    }, 300);



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
        $(function () {
            var inputs = $('.input');
            var paras = $('.description-flex-container').find('p');
            $(inputs).click(function () {
                var t = $(this),
                    ind = t.index(),
                    matchedPara = $(paras).eq(ind);

                $(t).add(matchedPara).addClass('active');
                $(inputs).not(t).add($(paras).not(matchedPara)).removeClass('active');
            });
        });


        $(document).ready(function () {
            function avatarSwitcher() {
                var readURL = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('.profile-pic').attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                };

                $(".file-upload").on('change', function(){
                    readURL(this);
                });

                $(".upload-button").on('click', function() {
                   $(".file-upload").click();
                });
            } avatarSwitcher();
            tabchange();

        });

        $(document).on('click','.tab-profile',function () {
            setTimeout(function(){
                tabchange();
                }, 300);

        });

        function tabchange() {
            var url = window.location.href;
            console.log(url);
            var res = url.split("#");
            var value = '';
            if (res.length > 1) {
                var value = res[1];
                $('.account_tab a[href="#' + value + '"]').tab('show');
            }
        }
    </script>

    <?php if(isset($_GET['error'])){ ?>
        <script>swal("Alert", "<?php echo $_GET['error'];  ?>", "warning");</script>
        <?php } ?>
        <?php if(isset($_GET['success'])){ ?>
        <script> swal("success!", "<?php echo $_GET['success'];  ?>", "success");  </script>
        <?php } ?>
<script type="text/javascript">
    setTimeout(function(){
        var clean_uri = location.protocol + "//" + location.host + location.pathname;
        window.history.replaceState({}, document.title, clean_uri);
    }, 5000);

</script>

@endsection
