@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/plugins/forms/validation/form-validation.css')}}">
    <link rel="
          stylesheet" type="text/css" href="{{URL::asset('public/Adminassets/css/plugins/forms/switch.min.css')}}">

@endsection
@section('content')
    <div class=" content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Users</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/user')}}">User</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Edit User</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">

        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="row-separator-colored-controls">User Profile</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <section class="input-validation">
                                @if(Auth::user()->hasRole('admin'))
                                    {{Form::open(array('url'=>'admin/user/'.$data['id'].'/update','method'=>'PUT','id'=>'my_form','class'=>'form form-horizontal row-separator','files'=>'true'))}}
                                @elseif(Auth::user()->hasRole('chef'))
                                    {{Form::open(array('url'=>'chef-admin/user/'.$data['id'].'/update','method'=>'PUT','id'=>'my_form','class'=>'form form-horizontal row-separator','novalidate','files'=>'true'))}}
                                @endif

                                @if(!empty($errors->all()))
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        @foreach($errors->all() as $error)
                                            <span> {{ $error }} </span><br>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Name</label>
                                                <div class="col-md-9">
                                                    {{Form::text('name',$data['name'],array('class'=>'form-control','id'=>'userinput1','placeholder'=>'Name','required'=>'true','data-validation-required-message'=>"Name field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="email">Email</label>
                                                <div class="col-md-9">
                                                    {{Form::email('email',$data['email'],array('class'=>'form-control','id'=>'email','placeholder'=>'email','required'=>'true','data-validation-required-message'=>"Email field is required"))}}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="phone_number">Mobile
                                                    Number</label>
                                                <div class="col-md-9">
                                                    {{Form::text('phone_number',$data['phone_number'],array('class'=>'form-control','id'=>'phone_number','placeholder'=>'Mobile Number','required'=>'true','data-validation-required-message'=>"Email field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="la la-envelope"></i> Contact Info</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="address">Address</label>
                                                <div class="col-md-9">
                                                    {{Form::text('address',$data['address'],array('class'=>'form-control','id'=>'address','placeholder'=>'Address'))}}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    {{Form::text('zipcode',$data['zipcode'],array('class'=>'form-control','id'=>'zipcode','placeholder'=>'Zipcode','required'=>'true'))}}
                                                </div>
                                                <div class="col-md-4">
                                                    {{Form::text('lat',$data['lat'],array('class'=>'form-control','id'=>'lat','placeholder'=>'latitute','readonly'=>'true'))}}
                                                </div>
                                                <div class="col-md-4">
                                                    {{Form::text('lang',$data['lang'],array('class'=>'form-control','id'=>'lang','placeholder'=>'longitute','readonly'=>'true'))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="la la-envelope"></i> Personal Info</h4>
                                    <div class="row">
                                        <!-- <div class="col-md-6"> -->
                                            <!-- <div class="form-group row"> -->
                                                <!-- <label class="col-md-3 label-control" for="user_role">User Role</label> -->
                                                <!-- <div class="col-md-9"> -->
                                                  {{-- {{Form::select('user_role',$role,$data->roles->first()->id,array('class'=>'form-control','required'=>'true','id'=>'user_role','data-validation-required-message'=>"This field is required"))}} --}}
                                                  {{Form::hidden('user_role',$data->roles->first()->id,array('class'=>'form-control','id'=>'user_role'))}}
                                                <!-- </div> -->
                                            <!-- </div> -->
                                        <!-- </div> -->
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="profile_pic">Status</label>
                                                <div class="col-md-9">
                                                    {{Form::select('status',array(''=>'Select Status','active'=>'Active','inactive'=>'Inactive','block'=>'Block'),$data['status'],array('class'=>'form-control','id'=>'status'))}}
                                                </div>
                                            </div>
                                        </div>
                                      {{--  @if(Auth::user()->hasRole('chef')) --}}
                                        <div class="col-md-6 cusinies-data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="cusinies">Cusinies</label>
                                                <div class="col-md-9">
                                                    {{Form::select('cusinies[]',@$cusinies,@$selectedCusinies,array('class'=>'select2-cusinies form-control','multiple'=>'multiple','id'=>'cusinies'))}}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @endif --}}
                                        <div class="col-md-6 cusinies-data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="cusinies">Year Of
                                                    Experience</label>
                                                <div class="col-md-9">
                                                    {{Form::text('year_of_experience',@$chefDetails->year_of_experience,array('class'=>'form-control','id'=>'year_of_experience','placeholder'=>'Year Of Experience'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 cusinies-data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="cusinies">Resturant
                                                    Name</label>
                                                <div class="col-md-9">
                                                    {{Form::text('resturant_name',@$chefDetails->resturant_name,array('class'=>'form-control','id'=>'resturant_name','placeholder'=>'Resturant Name'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 cusinies-data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control"
                                                       for="cusinies">Specialities</label>
                                                <div class="col-md-9">
                                                    {{Form::text('specialities',@$chefDetails->specialities,array('class'=>'form-control','id'=>'specialities','placeholder'=>'Specialities'))}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 cusinies-data bank_data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="cusinies">Account No</label>
                                                <div class="col-md-9">
                                                    {{Form::text('account_no',$data->account_no,array('class'=>'form-control','id'=>'account_no','placeholder'=>'Account No'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 cusinies-data bank_data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="cusinies">Bank Name</label>
                                                <div class="col-md-9">
                                                    {{Form::text('bank_name',$data->bank_name,array('class'=>'form-control','id'=>'bank_name','placeholder'=>'Bank Name'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 cusinies-data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="cusinies">About Chef</label>
                                                <div class="col-md-9">
                                                    {{Form::textarea('about_chef',@$chefDetails->about_chef,array('class'=>'form-control','rows'=>'4','id'=>'about_chef','placeholder'=>'About Chef'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 cusinies-data" style="display: none">
                                            <div class="form-group row">
                                                <label class="col-md-6 label-control" for="is_hyginic_course">is
                                                    Hygienic Course Verification ?</label>
                                                {{Form::checkbox('is_hyginic_course','yes',@$chefDetails->is_hyginic_course == 'yes' ? true :'',array('class'=>'form-control is_hyginic_course','id'=>'is_hyginic_course'))}}

                                            </div>
                                            <div class="form-group row col_hyginic_course" style="display: none">
                                                <label class="col-md-3 label-control" for="cusinies">Hygienic Course
                                                    Verification</label>
                                                <div class="col-md-9">
                                                    {{Form::file('hyginic_course',array('class'=>'form-control','id'=>'hyginic_course'))}}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="profile_pic">Profile
                                                    Pic</label>
                                                <div class="col-md-9">
                                                    {{Form::file('profile_pic',array('class'=>'form-control','id'=>'profile_pic'))}}
                                                    @if(!empty($data->profile_img))
                                                        <br>
                                                        <img
                                                            src="{{URL::to('public/upload/user/'.$data->profile_img)}}">
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            @if(!empty(@$chefDetails->hyginic_course))
                                                <br>
                                                <img
                                                    src="{{URL::to('public/upload/user/chef/'.@$chefDetails->hyginic_course)}}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    @if(Auth::user()->hasRole('admin'))
                                        <a href="{{URL::to('admin/user')}}" class="btn btn-warning mr-1">
                                            <i class="ft ft-x"></i> Cancel
                                        </a>
                                    @elseif(Auth::user()->hasRole('chef'))
                                        <a href="{{URL::to('chef-admin')}}" class="btn btn-warning mr-1">
                                            <i class="ft ft-x"></i> Cancel
                                        </a>
                                    @endif
                                    <!-- <button type="submit" class="btn btn-primary update">
                                        <i class="ft ft-check-square"></i> Update
                                    </button> -->
                                    <input type="submit" class="btn btn-primary update" value="update"/>
                                </div>
                                {{Form::close()}}
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugins')
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/select/select2.full.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/icheck/icheck.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/toggle/switchery.min.js')}}"
            type="text/javascript"></script>
@endsection
@section('script')
    <script src="{{URL::asset('public/Adminassets/js/scripts/forms/validation/form-validation.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/js/scripts/forms/select/form-select2.min.js')}}"
            type="text/javascript"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDb5KGfWAckxCGpoBYfAxNvPuiez5r_rJw"
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

        $(document).ready(function () {
            var val = $('#user_role').val();

            if (val == 3) {
                var is_hyginic_course = '{{@$chefDetails->is_hyginic_course}}';
                if (is_hyginic_course == 'yes') {
                    $('.col_hyginic_course').css('display', 'flex');
                } else {
                    $('.col_hyginic_course').css('display', 'none');
                }
            }

            if (val == 3) {
                $('.cusinies-data').css('display', 'block');
            } else {
                $('.cusinies-data').css('display', 'none');
            }

            if (val == 4 || val == 3) {
                $('.bank_data').css('display', 'block');
            } else {
                $('.bank_data').css('display', 'none');
            }

        });

        $(document).on('change', '#user_role', function () {
            var val = $('#user_role').val();

            if (val == 3) {
                $('.cusinies-data').css('display', 'block');
            } else {
                $('.cusinies-data').css('display', 'none');
            }

            if (val == 4 || val == 3) {
                $('.bank_data').css('display', 'block');
            } else {
                $('.bank_data').css('display', 'none');
            }
        });

        $(document).on('click', '#is_hyginic_course', function () {

            if ($(this).prop("checked") == true) {
                $('.col_hyginic_course').css('display', 'flex');
            } else if ($(this).prop("checked") == false) {
                $('.col_hyginic_course').css('display', 'none');
            }
        });

        $(".select2-cusinies").select2({placeholder: "Select Cusinies"})


    </script>
@endsection
