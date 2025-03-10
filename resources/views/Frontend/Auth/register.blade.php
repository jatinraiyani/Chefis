<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Chefis</title>
    <link rel="shortcut icon" href="{{URL::to('public/Frontassets/images/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,900|Roboto+Slab:100,300,400,700"
          rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/progressively.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/js/dishes/about.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/vieworder.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/responsive.css')}}">
    @yield('front_css')
    <title>Chefis</title>
</head>
<body>
<div class="login-page">
    <div class="row no-gutters align-items-center h-100">
        <div class="col-12 col-sm-12 col-md-8 col-lg-5">
            <div class="login-part">
                <div class="">
                    <a href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}" alt="logo"></a>
                </div>

                <h1 class="text-white">Hey there,<br>
                    <b>Welcome to Chefis.</b></h1>
                {{Form::open(array('url'=>'register','method'=>'POST','class'=>'login-box','novalidate','files'=>'true'))}}

                @if(!empty($errors->all()))
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert"></button>
                        @foreach($errors->all() as $error)
                            <span> {{ $error }} </span><br>
                        @endforeach
                    </div>
                @endif
                    <div class="form-group">
                        {{Form::text('name','',array('class'=>'form-control user-text','placeholder'=>'Name','required'=>'true','data-validation-required-message'=>"Name field is required"))}}
                    </div>
                    <hr>
                    <div class="form-group ">
                        {{Form::text('phone_number','',array('class'=>"form-control phone-text",'placeholder'=>'Mobile','required'=>'true','data-validation-required-message'=>"Mobile field is required"))}}
                    </div>
                    <hr>
                    <div class="form-group">
                        {{Form::email('email','',array('class'=>"form-control email-text",'placeholder'=>"Email Address",'required'=>'true','data-validation-required-message'=>"Email field is required"))}}
                    </div>
                    <hr>
                    <div class="form-group ">
                        {{Form::password('password',array('class'=>"form-control pass-text",'placeholder'=>'Password','required'=>'true','data-validation-required-message'=>"Password field is required"))}}
                    </div>
                    <hr>
                    <div class="form-group ">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="is_agree" id="customCheck1" required\ data-validation-required-message="Checkbox Required">
                            <label class="custom-control-label" for="customCheck1">i agree with terms and conditions</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-block text-left">Sign up <span class="ml-auto float-right"><img src="{{URL::to('public/Frontassets/images/rightarrow.png')}}" alt=""></span></button>
                {{Form::close()}}

                <div class="create-box">
                    <h6>have an account?</h6>
                    <a href="{{URL::to('login')}}">Login</a>
                </div>
            </div>

        </div>
        <div class="col-md-7">

        </div>
    </div>
</div>
<script src="{{URL::to('public/Frontassets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/progressively.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/popper.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/custom.js')}}"></script>
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
<script src="{{URL::asset('public/Adminassets/js/scripts/forms/validation/form-validation.js')}}"
        type="text/javascript"></script>
<script>

    function setCookie(cname, cvalue, exdays) {
        if (getCookie(cname) == "") {
            deleteCookie(cname);
        }
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1)
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length)
            }
        }
        return "";
    }

    function deleteCookie(cname) {
        document.cookie = cname + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;'
    }

    var site_url = "{{URL::to('/')}}";
    // progressively.init();
</script>
</body>

</html>
