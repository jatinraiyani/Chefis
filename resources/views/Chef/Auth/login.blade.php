<!--/**
 * Created by White Ornage Software.
 * User: Punit Kathiriya
 * Date: 25-03-2019
 * Time: 10:15 AM
 */-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/html/ltr/vertical-modern-menu-template/login-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Jun 2018 09:21:05 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chefis is best way to order food by online market place from your favorite chefs">
    <meta name="keywords" content="Chefis is best way to order food by online market place from your favorite chefs">
    <meta name="author" content="White Orange Software">
    <title>Login - Chefis Chef Panel
    </title>
    <link rel="apple-touch-icon" href="{{URL::to('public/Adminassets/images/logo/favicon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('public/Adminassets/images/logo/favicon.png')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="{{URL::to('public/Adminassets/css/line-awesome.min.html')}}" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/vendors/css/forms/icheck/custom.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/app.min.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{URL::to('public/Adminassets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::to('public/Adminassets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('public/Adminassets/css/pages/login-register.min.css')}}">
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
                    <div class="login-box box-shadow-2 p-0">
                        <div class="card  border-grey border-lighten-3 m-0">
                            <div class="card-header theme-bg border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="{{URL::to('public/Adminassets/images/logo/logo.png')}}"
                                             alt="branding logo">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Login with Chef</span>
                                </h6>
                            </div>
                            <div class="card-content theme-bg">
                                <div class="card-body">
                                    {{Form::open(array('url'=>'chef-admin/login','method'=>'POST','class'=>'form-horizontal form-simple','novalidate'))}}
                                    @if(!empty($errors->all()))
                                        <div class="alert alert-danger">
                                            <button class="close" data-close="alert"></button>
                                            @foreach($errors->all() as $error)
                                                <span> {{ $error }} </span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        {{Form::text('email','',array('class'=>'form-control form-control-lg input-lg','id'=>'user-name','placeholder'=>'Your Email / Phone-Number','required'=>'true'))}}
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        {{Form::password('password',array('class'=>'form-control form-control-lg input-lg','id'=>'user-password','placeholder'=>'Enter Password','required'=>'true'))}}
                                        <div class="form-control-position">
                                            <i class="ft ft-lock"></i>
                                        </div>
                                    </fieldset>

                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-md-left">
                                        </div>
                                        <div class="col-md-6 col-12 text-center text-md-right"><a
                                                href="{{URL::to('chef-admin/recover')}}" class="card-link">Forgot Password?</a>
                                        </div>
                                    </div>
                                    {{Form::submit('Login',array('class'=>'btn btn-info btn-lg btn-block'))}}

                                    {{Form::close()}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    <p class="float-sm-left text-center m-0"><a href="{{URL::to('chef-admin/recover')}}"
                                                                                class="card-link">Recover password</a>
                                    </p>
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
<script src="{{URL::to('public/Adminassets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{URL::to('public/Adminassets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/Adminassets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
        type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{URL::to('public/Adminassets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/Adminassets/js/core/app.min.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{URL::to('public/Adminassets/js/scripts/forms/form-login-register.min.js')}}"
        type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
