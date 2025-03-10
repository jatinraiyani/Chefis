@extends('layouts.admin')
@section('title')
    Add Adons | Master Admin
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/Adminassets/css/app.min.css')}}">
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
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/forms/selects/select2.min.css')}}">
@endsection
@section('content')
    <div class=" content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Adons</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('chef-admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('chef-admin/item/'.$id)}}">Adons</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Add Adons</a>
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
                        <h4 class="card-title" id="row-separator-colored-controls">Adons Profile</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">

                            <section class="input-validation">
                                {{Form::open(array('url'=>'chef-admin/item/'.$id.'/adons/store','method'=>'POST','class'=>'form form-horizontal row-separator','files'=>'true'))}}
                                @if(!empty($errors->all()))
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        @foreach($errors->all() as $error)
                                            <span> {{ $error }} </span><br>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> About Adons</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Title</label>
                                                <div class="col-md-9">
                                                    {{Form::text('title','',array('class'=>'form-control border-primary','id'=>'userinput1','placeholder'=>'Title','required'=>'true','data-validation-required-message'=>"This field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Box Type</label>
                                                <div class="col-md-9">
                                                    {{Form::select('box_type',array(''=>'Select Box Type','checkbox'=>'Multiple Select','radio'=>'Single Select'),'',array('class'=>'form-control border-primary','id'=>'userinput1','required'=>'true','data-validation-required-message'=>"This field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Box
                                                    Validation</label>
                                                <div class="col-md-9">
                                                    {{Form::select('box_validation',array(''=>'Select Box Validation','yes'=>'Yes','no'=>'No'),'',array('class'=>'form-control border-primary','id'=>'userinput1','required'=>'true','data-validation-required-message'=>"This field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Status</label>
                                                <div class="col-md-9">
                                                    {{Form::select('status',array(''=>'Select Status','active'=>'Active','inactive'=>'Inactive'),'',array('class'=>'form-control border-primary','id'=>'userinput1','required'=>'true','data-validation-required-message'=>"This field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="item_id" value="{{$id}}">
                                    <h4 class="form-section"><i class="la la-envelope"></i> Add Sub Adons</h4>
                                    <div class="subadons">
                                        <div class="row">
                                            <div class="col-md-4 ml-5">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput5">Sub adons
                                                        Name</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('sub_name[]','',array('class'=>'form-control border-primary','id'=>'sub_name','data-id'=>'sub-0','placeholder'=>'Sub Adons Name','required'=>'true','data-validation-required-message'=>"This field is required"))}}
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="userinput5">Price</label>
                                                    <div class="col-md-9">
                                                        {{Form::number('sub_price[]','',array('class'=>'form-control border-primary','id'=>'sub_price','data-id'=>'sub-0','placeholder'=>'Price','required'=>'true','data-validation-required-message'=>"This field is required",'min'=>'0'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-1">
                                                <a href="" class="btn btn-danger mr-1 add_subadons">
                                                    <i class="ft ft-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-actions right">
                                    <a href="{{URL::to('chef-admin/item/'.$id.'/adons')}}" class="btn btn-warning mr-1">
                                        <i class="ft ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
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
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/toggle/switchery.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/select/select2.full.min.js')}}"
            type="text/javascript"></script>
@endsection
@section('script')
    <script src="{{URL::asset('public/Adminassets/js/scripts/forms/validation/form-validation.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/forms/tags/form-field.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/js/scripts/forms/select/form-select2.min.js')}}"
            type="text/javascript"></script>
    <script>
        var i = 1;
        var wrapper = $(".subadons"); //Fields wrapper
        var add_button = $(".add_subadons"); //Add button ID

        var x = 1; //initlal text box count
        var y = 0;
        $(add_button).click(function (e) { //on add input button click
            var fieldname = $('#sub_name[data-id=' + y + ']');
            if (fieldname == "") {
                alert("Please enter fieldname");
            } else {
                e.preventDefault();
                // if(x < max_fields){ //max input box allowed
                x++;
                y++;//text box increment

                $(wrapper).append('<div class="row"><div class="col-md-4 ml-5"><div class="form-group row"><label class="col-md-3 label-control" for="userinput5">Sub adonsName</label><div class="col-md-9"><input type="text" name="sub_name[]" class="form-control border-primary" required="true" data-validation-required-message="This field is required" data-id="sub-\'+x+\'" id="sub_name" placeholder="Sub Adons Name"></div></div></div><div class="col-md-4"><div class="form-group row"><label class="col-md-3 label-control" for="userinput5">Price</label><div class="col-md-9"><input type="number" name="sub_price[]" class="form-control border-primary" required="true" data-validation-required-message="This field is required" min="0" id="sub_price" data-id="sub-\'+x+\'" placeholder="Price"></div></div></div><div class="col-md-2 mt-1"><a href="" class="btn btn-danger mr-1 delete_subadons"><i class="ft ft-minus"></i></a></div></div>'); //add input box

                // }
            }
        });

        $(wrapper).on("click", ".delete_subadons", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent().parent('div').remove();
            x--;
        })
    </script>
@endsection
