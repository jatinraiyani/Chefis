@extends('layouts.admin')
@section('title')
    Edit CMS
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
            <h3 class="content-header-title mb-0 d-inline-block">CMS</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/cms')}}">CMS</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Edit CMS</a>
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
                        <h4 class="card-title" id="row-separator-colored-controls">CMS Info</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <section class="input-validation">
                                {{Form::open(array('url'=>'admin/cms/'.$data['id'],'method'=>'PUT','class'=>'form form-horizontal row-separator','novalidate','files'=>'true'))}}
                                @if(!empty($errors->all()))
                                    <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        @foreach($errors->all() as $error)
                                            <span> {{ $error }} </span><br>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> About CMS</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="title">Title</label>
                                                <div class="col-md-9">
                                                    {{Form::text('title',$data['title'],array('class'=>'form-control','id'=>'title','placeholder'=>'Title','required'=>'true','data-validation-required-message'=>"Title field is required"))}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="slug">Slug</label>
                                                <div class="col-md-9">
                                                    {{Form::text('slug',$data['slug'],array('class'=>'form-control','id'=>'slug','placeholder'=>'Slug','required'=>'true','data-validation-required-message'=>"CMS Description field is required",'readonly'=>'true'))}}
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <h4 class="form-section"><i class="la la-envelope"></i> CMS Details</h4>
                                    <div class="row">
                                        @if($data['slug'] == 'stripe')
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="description">Stripe Public</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('description',$data['description'],array('class'=>'form-control','id'=>'description','placeholder'=>'Stripe Public Key'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="image">Stripe Secret</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('image',$data['image'],array('class'=>'form-control','id'=>'image','placeholder'=>'Stripe Secret Key'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="image">Stripe Mode</label>
                                                    <div class="col-md-9">
                                                        {{Form::select('meta_description',array('live'=>'Live','sandbox'=>'Sandbox'),$data['meta_description'],array('class'=>'form-control','id'=>'image','placeholder'=>'Stripe Mode'))}}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($data['slug'] == 'paypal')
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="description">Paypal Public</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('description',$data['description'],array('class'=>'form-control','id'=>'description','placeholder'=>'Paypal Public Key'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="image">Paypal Secret</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('image',$data['image'],array('class'=>'form-control','id'=>'image','placeholder'=>'Paypal Secret Key'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="image">Paypal Mode</label>
                                                    <div class="col-md-9">
                                                        {{Form::select('meta_description',array('live'=>'Live','sandbox'=>'Sandbox'),$data['meta_description'],array('class'=>'form-control','id'=>'image','placeholder'=>'Paypal Mode'))}}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($data['slug'] == 'application-version')
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="description">Android Version</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('description',$data['description'],array('class'=>'form-control','id'=>'description','placeholder'=>'Android Version'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="image">IOS Version</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('image',$data['image'],array('class'=>'form-control','id'=>'image','placeholder'=>'IOS Version'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="image">Force Update Android</label>
                                                    <div class="col-md-9">
                                                        {{Form::select('meta_description',array('true'=>'True','false'=>'False'),$data['meta_description'],array('class'=>'form-control','id'=>'image','placeholder'=>'Force Update Android'))}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="meta_image">Force Update IOS</label>
                                                    <div class="col-md-9">
                                                        {{Form::select('meta_image',array('true'=>'True','false'=>'False'),$data['meta_image'],array('class'=>'form-control','id'=>'meta_image','placeholder'=>'Force Update IOS'))}}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($data['slug'] == 'distance-radius')
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="image">Distance (in KM)</label>
                                                    <div class="col-md-9">
                                                        {{Form::text('meta_description',$data['meta_description'],array('class'=>'form-control','id'=>'image','placeholder'=>'Distance in KM'))}}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="description">Description</label>
                                                <div class="col-md-9">
                                                    {{Form::text('description',$data['description'],array('class'=>'form-control','id'=>'description','placeholder'=>'Description'))}}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="meta_description">Meta Description</label>
                                                <div class="col-md-9">
                                                    {{Form::textarea('meta_description',$data['meta_description'],array('class'=>'form-control','id'=>'meta_description','placeholder'=>'Meta Description'))}}
                                                </div>
                                            </div>

                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-actions right">
                                    <a href="{{URL::to('admin/cms')}}" class="btn btn-warning mr-1">
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
    @if($data['slug'] != 'paypal' && $data['slug'] != 'stripe' && $data['slug'] != 'application-version')
    <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    @endif
    <script>
        var update = '{{$data['slug']}}';
        console.log(update);
        if(update != 'paypal' && update != 'stripe' && update != 'application-version') {
            CKEDITOR.replace( 'description' );
            console.log(update);
        }

    </script>

@endsection
