@extends('layouts.admin')
@section('title')
    Edit Payment
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
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
            <h3 class="content-header-title mb-0 d-inline-block">Payment</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('chef-admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('chef-admin/payment')}}">Payment</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Edit Payment</a>
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
                        <h4 class="card-title" id="row-separator-colored-controls">Payment Profile</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <section class="input-validation">
                                {{Form::open(array('url'=>'chef-admin/payment/'.$data['id'],'method'=>'PUT','class'=>'form form-horizontal row-separator','novalidate','files'=>'true'))}}
                                @if(!empty($errors->all()))
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        @foreach($errors->all() as $error)
                                            <span> {{ $error }} </span><br>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> About Payment</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="order_number">Order Number</label>
                                                <div class="col-md-9">
                                                    {{Form::text('order_number',$data['order_number'],array('class'=>'form-control','id'=>'order_number','placeholder'=>'Order Number','required'=>'true','data-validation-required-message'=>"Order Number field is required",'readonly'=>'true'))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="payment_type">Payment
                                                    Type</label>
                                                <div class="col-md-9">
                                                    {{Form::text('payment_type',$data['payment_type'],array('class'=>'form-control','id'=>'payment_type','placeholder'=>'Payment Type','required'=>'true','data-validation-required-message'=>"Payment Description field is required",'readonly'=>'true'))}}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="amount">Payment
                                                    Amount</label>
                                                <div class="col-md-9">
                                                    {{Form::text('amount',$data['amount'],array('class'=>'form-control','id'=>'amount','placeholder'=>'Payment Amount','required'=>'true','data-validation-required-message'=>"Payment Description field is required",'readonly'=>'true'))}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="la la-envelope"></i> Payment Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="payment_id">Payment
                                                    ID</label>
                                                <div class="col-md-9">
                                                    {{Form::text('payment_id',$data['payment_id'],array('class'=>'form-control','id'=>'payment_id','placeholder'=>'Payment ID','required'=>'true','data-validation-required-message'=>"Payment ID field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="payment_status">Status</label>
                                                <div class="col-md-9">
                                                    {{Form::select('payment_status',array(''=>'Select Payment Status','pending'=>'Pending','success'=>'Success','failed'=>'Failed'),$data['payment_status'],array('class'=>'form-control','id'=>'payment_status','required'=>'true','data-validation-required-message'=>"Payment Status field is required"))}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <a href="{{URL::to('chef-admin/payment')}}" class="btn btn-warning mr-1">
                                        <i class="ft ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ft ft-check-square"></i> Update
                                    </button>
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
@endsection
