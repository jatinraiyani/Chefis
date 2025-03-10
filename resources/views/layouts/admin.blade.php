<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('includes.Admin.head')
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->

@include('includes.Admin.header')
@include('includes.Admin.sidebar')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')

        </div>
    </div>
</div>


@include('includes.Admin.footer')
<!-- BEGIN VENDOR JS-->
<script src="{{URL::to('public/Adminassets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
@yield('plugins')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{URL::to('public/Adminassets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/Adminassets/js/core/app.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('public/Adminassets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
@yield('script')
<!-- END PAGE LEVEL JS-->

</body>
</html>
