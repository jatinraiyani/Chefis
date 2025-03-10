<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chefis is best way to order food by online market place from your favorite chefs">
    <meta name="keywords" content="Chefis is best way to order food by online market place from your favorite chefs">
    <meta name="author" content="White Orange Software">
    <title>Unlock - Chefis Chef Panel
    </title>
    <link rel="apple-touch-icon" href="{{URL::to('public/Adminassets/images/logo/favicon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('public/Adminassets/images/logo/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="{{URL::to('public/Adminassets/fonts/line-awesome/1.1/css/line-awesome.min.html')}}"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/app.min.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/core/colors/palette-gradient.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/style.css')}}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="lock-box  box-shadow-2 p-0">
                        <div class="card theme-bg border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0 text-center theme-bg">

                                @if(file_exists(public_path('user/'.Auth::user()->profile_img)) && Auth::user()->profile_img != '')
                                    <img src="{{URL::to('public/user/'.Auth::user()->profile_img)}}" alt="user"  class="rounded-circle img-fluid center-block">
                                @else
                                    <img src="{{URL::to('public/default/default_user.png')}}" alt="user" class="rounded-circle img-fluid center-block" style="width: 150px;height: auto">
                                @endif

                                <h5 class="card-title mt-1 text-white">{{Auth::user()->name}}</h5>
                            </div>
                            <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2">
                                <span>Unlock your account</span>
                            </p>
                            <div class="card-content theme-bg">
                                <div class="card-body">
                                    {{Form::open(array('url'=>'chef-admin/lock','method'=>'POST','class'=>'form-horizontal','novalidate'=>'true'))}}

                                    @if(!empty($errors->all()))
                                        <div class="alert alert-danger">
                                            <button class="close" data-close="alert"></button>
                                            @foreach($errors->all() as $error)
                                                <span> {{ $error }} </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <fieldset class="form-group position-relative has-icon-left">
                                        {{Form::password('password',array('class'=>'form-control form-control-lg input-lg','id'=>'password','placeholder'=>'Enter Password','required'=>'true'))}}
                                        <div class="form-control-position">
                                            <i class="ft ft-lock"></i>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">

                                        <div class="col-md-11 col-12 float-sm-left text-center text-sm-right"><a href="{{URL::to('chef-admin/recover')}}" class="text-white -link"><i class="ft-unlock"></i> Forgot Password?</a></div>
                                    </div>
                                    {{Form::submit('Unlock',array('class'=>'btn btn-primary btn-lg btn-block'))}}
                                    <a href="{{URL::to('chef-admin/logout')}}" class="btn btn-danger btn-lg btn-block"><i class="ft-power"></i> Logout</a>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- BEGIN VENDOR JS-->
<script src="{{URL::asset('public/Adminassets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{URL::to('public/Adminassets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
        type="text/javascript"></script>
<script src="{{URL::to('public/Adminassets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{URL::to('public/Adminassets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/Adminassets/js/core/app.min.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{URL::to('public/Adminassets/js/scripts/forms/form-login-register.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>

</html>
