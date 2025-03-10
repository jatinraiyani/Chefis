@extends('layouts.admin')
@section('title')
    Add Item
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
    <link rel="
          stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/colors/palette-switch.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/plugins/animate/animate.min.css')}}">
@endsection
@section('content')
    <div class=" content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Items</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/item')}}">Item</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Add Item</a>
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
                        <h4 class="card-title" id="row-separator-colored-controls">Item Profile</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <section class="input-validation">
                                {{Form::open(array('url'=>'admin/item','method'=>'POST','class'=>'form form-horizontal row-separator','novalidate','files'=>'true'))}}
                                @if(!empty($errors->all()))
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        @foreach($errors->all() as $error)
                                            <span> {{ $error }} </span><br>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> About Item</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="chef_id">Chef Name</label>
                                                <div class="col-md-9">
                                                    {{Form::select('chef_id',$chef,'',array('class'=>'form-control','id'=>'chef_id','required'=>'true','data-validation-required-message'=>"Name field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="category">Cuisine</label>
                                                <div class="col-md-9">
                                                    <button type="button"
                                                            class="btn btn-primary btn-min-width mr-1 mb-1 cuisines_seleted_button"
                                                            data-toggle="modal" data-target="#large">Select Cuisine
                                                    </button>
                                                    {{-- {{Form::select('category_id',$category,'',array('class'=>'form-control','id'=>'category','required'=>'true','data-validation-required-message'=>"Name field is required"))}}--}}
                                                    <div class="selected_cuisine"></div>
                                                </div>
                                            </div>

                                            <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel17" aria-modal="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel17">Cuisines</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                @forelse($cuisine as $row)
                                                                    <div class="col-md-2" style="padding: 10px;">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                   class="custom-control-input"
                                                                                   name="cuisines[]"
                                                                                   value="{{$row->id}}"
                                                                                   id="customCheck{{$row->id}}" data-value="{{$row->cuisine_name}}">
                                                                            <label class="custom-control-label"
                                                                                   for="customCheck{{$row->id}}">{{$row->cuisine_name}}</label>
                                                                        </div>
                                                                    </div>
                                                                @empty
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary add_cuisines"
                                                                    data-dismiss="modal">Add+
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="item_name">Item Name</label>
                                                <div class="col-md-9">
                                                    {{Form::text('item_name','',array('class'=>'form-control','id'=>'item_name','placeholder'=>'Item Name','required'=>'true','data-validation-required-message'=>"Email field is required"))}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="item_price">Item
                                                    Price</label>
                                                <div class="col-md-9">
                                                    {{Form::text('item_price','',array('class'=>'form-control','id'=>'item_price','placeholder'=>'Item Price','required'=>'true','data-validation-required-message'=>"Email field is required"))}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="profile_pic">Item
                                                    Image</label>
                                                <div class="col-md-9">
                                                    {{Form::file('item_image',array('class'=>'form-control','id'=>'profile_pic'))}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="item_preparation_time">Item Preparation Time (in Minutes)</label>
                                                <div class="col-md-9">
                                                    {{Form::text('item_preparation_time','',array('class'=>'form-control','id'=>'item_preparation_time','placeholder'=>'Item Preparation Time (in minute)','required'=>'true','data-validation-required-message'=>"Email field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="item_description">Item
                                                    Description</label>
                                                <div class="col-md-9">
                                                    {{Form::textarea('item_description','',array('class'=>'form-control','id'=>'item_description','placeholder'=>'Item Description','required'=>'true','data-validation-required-message'=>"Email field is required"))}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <h4 class="form-section"><i class="la la-envelope"></i> Item On Demand</h4>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-1"><h3>Day</h3></div>
                                                        <div class="col-5 text-center"><h3>First Slot</h3></div>
                                                        <div class="col-5 text-center"><h3>Second Slot</h3></div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php $d = Config::get('constant.day'); ?>
                                                    @foreach(Config::get('constant.day') as $key1 => $value)
                                                        <div class="row">
                                                                <div class="col-1 p-r-zero mt-1">
                                                                    <p class="text-defualt pull-left"> {{$value}}</p>
                                                                    {{Form::hidden('days[]',$value)}}
                                                                </div>
                                                                <div class="col-auto selecthours p-r-zero mt-1">
                                                                    {{--{{Form::select('status[]',['open'=>'Open','close'=>'Close'],'',array('class'=>'form-control status','data-id'=>$key1))}}--}}
                                                                    <div class="float-left">
                                                                        <input type="checkbox" name="status1[<?=$d[$key1]?>][]"
                                                                               class="switch status" data-off-label="Close"
                                                                               data-on-label="Open" id="switch1"
                                                                               data-id="{{$key1}}" checked="checked"/>
                                                                        <input type="hidden" name="status[<?=$d[$key1]?>][]" class="status1"
                                                                               data-id="{{$key1}}" value=""/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto selecthours p-r-zero mt-1">
                                                                    <!--{{Form::select('f_start_time[]',[''=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control f_start_time','data-id'=>$key1))}}-->
                                                                    <?=Form::select('f_start_time['.$d[$key1].'][]',['00:00'=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control f_start_time','data-id'=>$key1))?>
                                                                </div>
                                                                <div class="pull-left mt-2"><span class="tospan">To</span>
                                                                </div>
                                                                <div class="col-auto selecthours p-r-zero mt-1">
                                                                    <!--{{Form::select('f_end_time[]',[''=>'00:00']+Config::get('constant.time'),'18.00',array('class'=>'form-control f_end_time','data-id'=>$key1))}}-->
                                                                    <?=Form::select('f_end_time['.$d[$key1].'][]',['00:00'=>'00:00']+Config::get('constant.time'),'18.00',array('class'=>'form-control f_end_time','data-id'=>$key1))?>
                                                                </div>
                                                                <div class="col-auto selecthours p-r-zero mt-1">
                                                                    <!--{{Form::text('f_qty[]','',array('class'=>'form-control f_qty','data-id'=>$key1,'placeholder'=>'Quantity'))}}-->
                                                                    <?=Form::number('f_qty['.$d[$key1].'][]',0,array('class'=>'form-control f_qty','data-id'=>$key1,'placeholder'=>'Quantity','min'=>'1'))?>
                                                                </div>
                                                                <div class="col-auto selecthours p-r-zero mt-1">
                                                                    <!--{{Form::select('s_start_time[]',[''=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control s_start_time','data-id'=>$key1))}}-->
                                                                    <?=Form::select('s_start_time['.$d[$key1].'][]',['00:00'=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control s_start_time','data-id'=>$key1))?>
                                                                </div>
                                                                <div class="pull-left mt-2"><span class="tospan">To</span>
                                                                </div>
                                                                <div class="col-auto selecthours p-r-zero mt-1">
                                                                    <!--{{Form::select('s_end_time[]',[''=>'00:00']+Config::get('constant.time'),'18.00',array('class'=>'form-control s_end_time','data-id'=>$key1))}}-->
                                                                    <?=Form::select('s_end_time['.$d[$key1].'][]',['00:00'=>'00:00']+Config::get('constant.time'),'18.00',array('class'=>'form-control s_end_time','data-id'=>$key1))?>
                                                                </div>
                                                                <div class="col-auto selecthours p-r-zero mt-1">
                                                                    <!--{{Form::text('s_qty[]','',array('class'=>'form-control s_qty','data-id'=>$key1,'placeholder'=>'Quantity'))}}-->
                                                                    <?=Form::number('s_qty['.$d[$key1].'][]',0,array('class'=>'form-control s_qty','data-id'=>$key1,'placeholder'=>'Quantity','min'=>'0'))?>
                                                                </div>


                                                            </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="form-section"><i class="la la-envelope"></i> Item On Scheduled</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-1"><h3>Day</h3></div>
                                                        <div class="col-3 text-center"><h3>Item Time</h3></div>
                                                        <div class="col-3"><h3>Delivered Time</h3></div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php $d = Config::get('constant.day'); ?>
                                                    @foreach(Config::get('constant.day') as $key1 => $value)
                                                        <div class="row">
                                                            <div class="col-1 p-r-zero mt-1">
                                                                <p class="text-defualt pull-left"> {{$value}}</p>
                                                                {{Form::hidden('d_days[]',$value,array('class' => 'hidden_d_day'))}}
                                                            </div>
                                                            <div class="col-auto selecthours p-r-zero mt-1">
                                                                {{--{{Form::select('status[]',['open'=>'Open','close'=>'Close'],'',array('class'=>'form-control status','data-id'=>$key1))}}--}}
                                                                <div class="float-left">
                                                                    <input type="checkbox" name="d_status1[<?=$d[$key1]?>][]"
                                                                           class="switch sd_status" data-off-label="Close"
                                                                           data-on-label="Open" id="switch1"
                                                                           data-id="{{$key1}}" checked="checked"/>
                                                                    <input type="hidden" name="d_status[<?=$d[$key1]?>][]" class="sd_status1"
                                                                           data-id="{{$key1}}" value=""/>

                                                                </div>
                                                            </div>
                                                            <div class="col-auto selecthours p-r-zero mt-1">
                                                                <!--{{Form::select('start_time[]',[''=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control start_time','data-id'=>$key1))}}-->
                                                                <?=Form::select('start_time['.$d[$key1].'][]',['00:00'=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control start_time','data-id'=>$key1))?>
                                                            </div>
                                                            <div class="pull-left mt-2"><span class="tospan">To</span>
                                                            </div>
                                                            <div class="col-auto selecthours p-r-zero mt-1">
                                                                <!--{{Form::select('end_time[]',[''=>'00:00']+Config::get('constant.time'),'18.00',array('class'=>'form-control end_time','data-id'=>$key1))}}-->
                                                                <?=Form::select('end_time['.$d[$key1].'][]',['00:00'=>'00:00']+Config::get('constant.time'),'18.00',array('class'=>'form-control end_time','data-id'=>$key1))?>
                                                            </div>

                                                            <div class="col-auto selecthours p-r-zero mt-1">
                                                                <!--{{Form::select('deliver_day[]',[''=>'Select Day']+Config::get('constant.day'),$key1,array('class'=>'form-control start_time','data-id'=>$key1))}}-->
                                                                <?=Form::select('deliver_day['.$d[$key1].'][]',[''=>'Select Day']+Config::get('constant.day'),$key1,array('class'=>'form-control day','data-id'=>$key1,'data-day'=>$d[$key1]))?>

                                                            </div>
                                                            <div class="col-auto selecthours p-r-zero mt-1">
                                                                <!--{{Form::select('d_time[]',[''=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control d_time','data-id'=>$key1))}}-->
                                                                <?=Form::select('d_time['.$d[$key1].'][]',['00:00'=>'00:00']+Config::get('constant.time'),'',array('class'=>'form-control d_time','data-id'=>$key1))?>
                                                            </div>

                                                            <div class="col-auto selecthours p-r-zero mt-1">
                                                                <!--{{Form::text('d_qty[]','',array('class'=>'form-control qty','data-id'=>$key1,'placeholder'=>'Quantity'))}}-->
                                                                <?=Form::number('d_qty['.$d[$key1].'][]',0,array('class'=>'form-control qty','data-id'=>$key1,'placeholder'=>'Quantity','min'=>'0'))?>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <a href="{{URL::to('admin/item')}}" class="btn btn-warning mr-1">
                                        <i class="ft ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary submit">
                                        <i class="ft ft-check-square"></i> Save
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
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
            type="text/javascript"></script>

    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/toggle/switchery.min.js')}}"
            type="text/javascript"></script>
@endsection
@section('script')
    <script src="{{URL::asset('public/Adminassets/js/scripts/forms/validation/form-validation.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/js/scripts/forms/switch.min.js')}}"
            type="text/javascript"></script>

    <script src="{{URL::asset('public/Adminassets/js/scripts/modal/components-modal.min.js')}}"></script>
    <script>
        $(document).on('change', '.status', function () {
            var id = $(this).data('id');
            var val = $(this).val();

            if ($('.status[data-id=' + id + ']').prop('checked') == false) {
                $('.f_start_time[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.f_end_time[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.f_end_time[data-id=' + id + ']').val('');
                $('.f_qty[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.s_qty[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.s_start_time[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.s_end_time[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.s_end_time[data-id=' + id + ']').val('');
                $('.status1[data-id=' + id + ']').val('close');
            } else {
                $('.status1[data-id=' + id + ']').val('open');
                $('.f_start_time[data-id=' + id + ']').prop('disabled', false);
                $('.f_end_time[data-id=' + id + ']').prop('disabled', false);
                $('.s_start_time[data-id=' + id + ']').prop('disabled', false);
                $('.s_end_time[data-id=' + id + ']').prop('disabled', false);
                $('.f_qty[data-id=' + id + ']').prop('disabled', false);
                $('.s_qty[data-id=' + id + ']').prop('disabled', false);
                $('.f_end_time[data-id=' + id + ']').val('11.00');
                $('.s_start_time[data-id=' + id + ']').val('13.00');
                $('.s_end_time[data-id=' + id + ']').val('18.00');
            }
        });

        $(document).on('change', '.f_start_time', function () {
            var id = $(this).data('id');
            var val = $(this).val();
            var end_time = $('.f_end_time[data-id='+id+']').val();

            var s_start_time = $('.s_start_time[data-id='+id+']').val();
            var s_end_time = $('.s_end_time[data-id='+id+']').val();

            if(val > end_time){

                $('.f_end_time[data-id=' + id + ']').val('');

                alert('you are selected time Smaller then end time.');
            }
            if(s_start_time != '' && s_end_time != ''){
                if(val > s_start_time || val > s_end_time ){
                    $('.s_start_time[data-id=' + id + ']').val('');
                    $('.s_end_time[data-id=' + id + ']').val('');
                    alert('you are selected time Smaller then Second Slot time.');
                }
            }
        });

        $(document).on('change', '.f_end_time', function () {
            var id = $(this).data('id');
            var val = $(this).val();
            var start_time = $('.f_start_time[data-id='+id+']').val();

            var s_start_time = $('.s_start_time[data-id='+id+']').val();
            var s_end_time = $('.s_end_time[data-id='+id+']').val();

            if(val < start_time){
                $('.f_end_time[data-id=' + id + ']').val('');
                alert('you are selected time higher then Start time.');
            }
            if(s_start_time != '' && s_end_time != ''){
                if(val > s_start_time || val > s_end_time ){
                    $('.s_start_time[data-id=' + id + ']').val('');
                    $('.s_end_time[data-id=' + id + ']').val('');
                    alert('you are selected time Smaller then Second Slot time.');
                }
            }
        });

        $(document).on('change', '.s_start_time', function () {
            var id = $(this).data('id');
            var val = $(this).val();
            var end_time = $('.s_end_time[data-id='+id+']').val();

            var f_start_time = $('.f_start_time[data-id='+id+']').val();
            var f_end_time = $('.f_end_time[data-id='+id+']').val();

            if(val > end_time){
                $('.s_end_time[data-id=' + id + ']').val('');
                alert('you are selected time Smaller then End time.');
            }
            if(f_start_time != '' && f_end_time != ''){
                if(val < f_start_time || val < f_end_time ){
                    $(this).val('');
                    alert('you are selected time higher then First slot time.');
                }
            }
        });

        $(document).on('change', '.s_end_time', function () {
            var id = $(this).data('id');
            var val = $(this).val();
            var start_time = $('.s_start_time[data-id='+id+']').val();

            var f_start_time = $('.f_start_time[data-id='+id+']').val();
            var f_end_time = $('.f_end_time[data-id='+id+']').val();

            if(val < start_time){
                $('.s_start_time[data-id=' + id + ']').val('');
                alert('you are selected time higher then Start time.');
            }
            if(f_start_time != '' && f_end_time != ''){
                if(val < f_start_time || val < f_end_time ){
                    $(this).val('');
                    alert('you are selected time higher then First slot time.');
                }
            }
        });

        $(document).on('change', '.start_time', function () {
            var id = $(this).data('id');
            var val = $(this).val();
            var end_time = $('.end_time[data-id=' + id + ']').val();

            if (val > end_time) {
                $('.start_time[data-id=' + id + ']').val('');
                alert('you are selected time higher then end time.');
            }



        });

        $(document).on('change', '.end_time', function () {
            var id = $(this).data('id');
            var val = $(this).val();
            var start_time = $('.start_time[data-id=' + id + ']').val();

            if (val < start_time) {
                $('.end_time[data-id=' + id + ']').val('');
                alert('you are selected time lower then start time.');
            }
        });

        $(document).on('change', '.sd_status', function () {
            var id = $(this).data('id');
            var val = $(this).val();

            if ($('.sd_status[data-id=' + id + ']').prop('checked') == false) {
                $('.start_time[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.end_time[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.end_time[data-id=' + id + ']').val('');
                $('.d_time[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.d_time[data-id=' + id + ']').val('');
                $('.qty[data-id=' + id + ']').prop('disabled', 'disabled');
                $('.sd_status1[data-id=' + id + ']').val('close');
            } else {
                $('.sd_status1[data-id=' + id + ']').val('open');
                $('.start_time[data-id=' + id + ']').prop('disabled', false);
                $('.end_time[data-id=' + id + ']').prop('disabled', false);
                $('.qty[data-id=' + id + ']').prop('disabled', false);
                $('.d_time[data-id=' + id + ']').prop('disabled', false);
                $('.d_time[data-id=' + id + ']').val('01.00');
                $('.end_time[data-id=' + id + ']').val('18.00');

            }
        });

        $(document).on('change','.d_time',function(){

          var selectedDay = $(this).closest('.row').find('.day option:selected').text();
          var defaultDay = $(this).closest('.row').find('.hidden_d_day').val();
          var startTime = $(this).closest('.row').find('.start_time').val();
          var endTime = $(this).closest('.row').find('.end_time').val();
          var dTime = $(this).val();

          if(selectedDay === defaultDay){

             // if(dTime < startTime){
             //   $(this).val('');
             //   alert('you are selected time Lower then Start Time');
             // }

             if(dTime > endTime){
               $(this).val('');
               alert('you are selected time Higher then End Time.');
             }

          }

        });

    </script>
    <script>
            $(document).on('click','.add_cuisines',function () {
                var favorite = [];
                $.each($("input[name='cuisines[]']:checked"), function(){
                    favorite.push($(this).data('value'));
                });
                var html ='<ul class="selected-cuisine-data">';
                $.each(favorite,function (i,item) {
                    html +='<li>'+item+'</li>';
                });
                html += '</ul>';

                $('.selected_cuisine').html(html);
                if (favorite.length > 0) {

                    $('.cuisines_seleted_button').text('Update Cuisine');
                    $('.submit').attr("disabled", false);
                } else {
                    $('.cuisines_seleted_button').text('Select Cuisine');
                    $('.submit').attr("disabled", true);
                }
            });
    </script>
@endsection
