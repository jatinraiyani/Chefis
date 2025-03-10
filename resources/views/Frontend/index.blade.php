@extends('layouts.frontend')
@section('front_title') Home @endsection
@section('front_css')
    <link href="{{URL::to('public/Frontassets/css/jquery.typeahead.css')}}">
    <style>
        .twitter-typeahead,
        .tt-hint,
        .tt-input,
        .tt-menu{
            width: 100% ! important;
            font-weight: normal;

        }
    </style>
@endsection
@section('content')
@if(Session::has('message'))
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{!! session('message') !!}
	</div>
@endif
    <section class="banner-box">
        <div class="banner-cation">
            <h1>We Deliver Best Food<br>
                <b>From The Best Chefs Nearby</b></h1>
            <form method="get">
                {{ csrf_field() }}
                <div class="search-box">
                    <div class="row no-gutters align-items-center justify-content-md-center">
                      <div class="col-lg-4 search-location pr-0">
                        <input class="form-control" name="address" type="text" id="address" placeholder="Select your Current Location">
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lang" id="lang">
                        <button class="current-location" onclick="get_location();"> <img src="{{URL::to('public/Frontassets/images/yourlocation.png')}}"  alt=""> </button>
                      </div>
                        <div class="col-lg-6 pl-0">
                            <div class="formgroup p-0 m-0">
                                <input class="form-control" name="search" id="search" type="text" placeholder="Search food, Chefs, Cuisines etc">
                                <input type="hidden" id="type" value="">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="button" class="search-btn btn" id="search-button" value="Search"></div>
                    </div>
                </div>
            </form>
            <div class="col-12 col-md-10 col-lg-8 col-xl-7" id="no-delivery">
            </div>
        </div>
    </section>
    <section class="finechefs section-gapping">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 text-center">
                    <h2 class="title text-white">Find <b>Chefs</b></h2>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    <button class="btn btn-white item_demand" id="ondemand" data-value="ondemand">On Demand</button>
                    <button class="btn btn-order ml-4 item_demand" id="planahead" data-value="planahead">Plan Ahead</button>
                </div>
            </div>
        </div>
    </section>
    <section class="dishes-nearby section-gapping">

        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>

                </div>
            </div>

        </div>
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <h2 class="title text-black">Nearby <b>Dishes</b></h2></div>
            </div>
            <div class="bestdishes" id="near_by_dishes">
                <div class="row">
                    <div style="display: none;">{{$j = 1}}</div>
                    @foreach($item as $row)
                        @if($j < 8)
                            <div class="col-md-3">
                                <a href="{{URL::to('chef/'.strtolower(str_replace(' ','-',@$row->chefData->name)))}}">
                                    <div class="bestdishes-box">
                                        <div class="bestdishes-img">
                                            <div class="min-delivery">{{$row->item_preparation_time}} min</div>
                                            <figure class="progressive">
                                            <img
                                                src="{{URL::to('public/upload/item/'.$row->item_image)}}"
                                                class="progressive__img progressive--not-loaded img-fluid"
                                                alt="">
                                            </figure>
                                            <div class="favorites"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                        </div>
                                        <div class="bestdishes-info">
                                            <h6>{{@$row->item_name}}</h6>
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
                            <div style="display: none;">{{$j++}}</div>
                        @endif
                    @endforeach
                    @if($j >= 8)
                        <div class="col-md-3">
                            <a href="{{URL::to('near-by-dishes')}}">
                                <div class="addmore">
                                    +{{count($item) - 8}} More
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="trending section-gapping">
        <div id="loading" class="trending_section">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>

                </div>
            </div>

        </div>
        <div class="container">
            <div class="row justify-content-between mb-5">
                <div class="col-md-5">
                    <h2 class="title text-white">Trending <b>Cuisines</b></h2></div>
            </div>
            <div class="grid row" id="near_by_best_dishes">
                <div style="display: none;">{{$i = 1}}</div>
                @foreach($trending as $row)
                    @if($i < 9)
                        <div class=" col-md-4">
                            <div class="media grid-list">
                                <div class="trending-img mr-3">
                                    <figure class="progressive">
                                    <img class="progressive__img progressive--not-loaded img-fluid" src="{{URL::to('public/upload/item/'.$row->item_image)}}"
                                         alt="">
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0">{{$row->item_name}}</h5>
                                    <p>{{@$row->categoryData->category_name}}</p>
                                    <hr class="border-short">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="prise">${{$row->item_price}}</div>
                                        </div>
                                        <div class="col text-right pr-0"><a class="pluse ml-auto text-white">+</a></div>
                                    </div>
                                </div>
                                <div class="favorites"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <div style="display: none;">{{$i++}}</div>
                    @endif
                @endforeach
                <div class="col-md-4">
                    <div class="addmore-cuisines">
                        +{{count($trending) - 8}} More
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section-gapping">
        <div id="loading" class="chef_section">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>

                </div>
            </div>

        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="title text-black">Nearby <b>Chefs</b></h2>
                </div>
            </div>
            <div class="nearbychefs">
                <div class="owl-carousel">
                    @foreach($chef as $row)
                        <div class="items">
                            <a href="{{URL::to('chef/'.strtolower(str_replace(' ','-',$row->name)))}}">
                                <div class="media">
                                    <div class="mr-4 near-checf-img">
                                        @if(file_exists(public_path('upload/user/'.$row->profile_img)) && $row->profile_img != '')
                                            <img src="{{URL::to('public/upload/user/'.$row->profile_img)}}"
                                                 class="img-fluid" alt="user">
                                        @else
                                            <img src="{{URL::to('public/default/default_user.png')}}"
                                                 class="img-fluid"
                                                 alt="user">
                                        @endif
                                    </div>
                                    <div class="media-body trend-info">
                                        <h4 class="mt-0 mb-2">{{$row->name}}</h4>
                                        <h6>{{$row->cusines}}</h6></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="choosearea section-gapping">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title text-white">Choose an <b>Area to Explore</b></h2></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul>
                       <!-- @forelse($areas as $area)
                       <li class="areaExplore" data-area="{{$area->availability}}" data-id="{{$area->id}}">{{$area->area_name}}</li>
                       @empty
                        No Any Area Yet.
                       @endforelse -->
                        <li class="areaExplore" data-area="San" data-id="1">San Francisco-Oakland</li>
                        <li class="areaExplore" data-area="Bakersfield">Bakersfield</li>
                        <li class="areaExplore" data-area="">Antioch</li>
                        <li class="areaExplore" data-area="">Hemet</li>
                        <li class="areaExplore" data-area="">San Diego</li>
                        <li class="areaExplore" data-area="">Murrieta-Temecula-Menifee</li>
                        <li class="areaExplore" data-area="">Santa Clarita</li>
                        <li class="areaExplore" data-area="">San Diego</li>
                        <li class="areaExplore" data-area="">San Diego</li>
                        <li class="areaExplore" data-area="">Stockton</li>
                        <li class="areaExplore" data-area="">Visalia</li>
                        <li class="areaExplore" data-area="">Santa Maria</li>
                        <li class="areaExplore" data-area="">Sacramento</li>
                        <li class="areaExplore" data-area="Oxnard">Oxnard</li>
                        <li class="areaExplore" data-area="">Thousand Oaks</li>
                        <li class="areaExplore" data-area="">El Centro-Calexico</li>
                        <li class="areaExplore" data-area="">San Jose</li>
                        <li class="areaExplore" data-area="">Modesto</li>
                        <li class="areaExplore" data-area="">Santa Barbara</li>
                        <li class="areaExplore" data-area="">San Jose</li>
                        <li class="areaExplore" data-area="">Fresno</li>
                        <li class="areaExplore" data-area="">Indio-Cathedral City</li>
                        <li class="areaExplore" data-area="">Salinas</li>
                        <li class="areaExplore" data-area="">Turlock</li>
                        <li class="areaExplore" data-area="">Concord</li>
                        <li class="areaExplore" data-area="">Santa Rosa</li>
                        <li class="areaExplore" data-area="">Vallejo</li>
                        <li class="areaExplore" data-area="">Gilroy-Morgan Hill</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="readyorder section-gapping">
        <div class="container">
            <h2 class="title text-white text-center">Ready for <b>your Order</b></h2>
            <div class="youorder">
                <div class="row justify-content-center">
                    <!--<div class="col-md-6">

                        <input class="form-control" name="address" type="text" id="address" placeholder="Select your Current Location">
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lang" id="lang">
                        <input type="submit" class="search-button" value="Search">
                        <button class="current-location" onclick="get_location();"><img src="{{URL::to('public/Frontassets/images/yourlocation.png')}}" alt="" ></button>


                    </div>-->
                    <table id="address" style="display:none">
                        <tr>
                            <td class="label">Street address</td>
                            <td class="slimField">
                                <input class="field" id="street_number" disabled="true">
                            </td>
                            <td class="wideField" colspan="2">
                                <input class="field" id="route" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">City</td>

                            <td class="wideField" colspan="3">
                                <input class="field" id="locality" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="slimField">
                                <input class="field" id="administrative_area_level_1" disabled="true">
                            </td>
                            <td class="label">Zip code</td>
                            <td class="wideField">
                                <input class="field" id="postal_code" disabled="true">
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Country</td>
                            <td class="wideField" colspan="3">
                                <input class="field" id="country" disabled="true">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Area To explorer Modal Start -->

    <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalCenterTitle">Register your Name and Email here to be the First to know when we open in your Area!”</h6>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
         <form class="card-form" method="POST" action="{{URL::to('storeAreaInquiry')}}">
           @csrf
           <div class="form-row">
               <div class="form-group col-md-12">
                   <input type="text" class="form-control" required="required" name="name" placeholder="Enter Your Name">
                   <input type="hidden" name="area_id" id="areaId" value="">
                 </div>
           </div>
           <div class="form-row">
               <div class="form-group col-md-12">
                   <input type="email" class="form-control" required="required" name="email" placeholder="Enter Your Email">
                 </div>
           </div>
          <button type="submit" class="btn btn-lg btn-block ">Send Us</button>
        </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Area To explorer Modal End -->
@endsection
@section('front_js')
    <script
        src="https://maps.googleapis.com/maps/api/js?types=geocode&amp;libraries=places&key=AIzaSyDb5KGfWAckxCGpoBYfAxNvPuiez5r_rJw"
        type="text/javascript"></script>
	<script type="text/javascript">

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('address')),
                {types: ['geocode'], componentRestrictions: {country: 'mx'}},);


            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {                                      
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }


            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
            var select_city = $('#locality').val();

            var address = $('#address').val();


            $("html,body").animate({scrollTop:$('.dishes-nearby').offset().top-20},1000)
            setCookie("city", select_city.toLowerCase(), 15);
            setCookie("address", address, 15);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': address}, function (results, status) {
                // console.log(results);
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    // console.log("location : " + latitude + " " + longitude);

                    setCookie("city_lat_long", latitude + "," + longitude, 15);
                    setCookie("location", select_city, 15);
                    setCookie("lat", latitude, 15);
                    setCookie("long", longitude, 15);
                    getNearestDishes(latitude, longitude);
                    getNearestChef(latitude, longitude);
                    getTrendingItem(latitude, longitude);
                    search(latitude, longitude);
                    // search(select_city);
                    // get_best_dishes();
                    // get_trend_chef();
                    // get_all_chef();
                } else {
                    // alert("Something got wrong " + status);
                }

            });
            // $('#search').val('');

        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());


                });
            }
        }

        function get_location() {

            if (window.navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                        var lat = position.coords.latitude,
                            lng = position.coords.longitude,
                            latlng = new google.maps.LatLng(lat, lng),
                            geocoder = new google.maps.Geocoder();

                        geocoder.geocode({'latLng': latlng}, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                var city = "";
                                if (results[1]) {
                                    for (var i = 0; i < results.length; i++) {
                                        if (results[i].types[0] === "locality") {
                                            var city = results[i].address_components[0].short_name;
                                            var state = results[i].address_components[2].short_name;
                                        }
                                    }
                                }

                                setCookie("city", city.toLowerCase(), 15);
                                setCookie("location", city, 1);
                                setCookie("address", results[0].formatted_address, 1);
                                setCookie("city_lat_long", lat + ',' + lng, 15);
                                setCookie("lat", lat, 15);
                                setCookie("long", lng, 15);
                                $('#autocomplete').val(results[0].formatted_address);

                                if (results[1]) {

                                } else {
                                    console.log("No reverse geocode results.")
                                }
                            } else {
                                console.log("Geocoder failed: " + status)
                            }
                        });
                    },
                    function () {
                        console.log("Geolocation not available.")
                    });
            }
        }

        $(document).ready(function () {
            setTimeout(function () {
                initAutocomplete();
            }, 500)

            var user_city = getCookie('city');
            var user_location = getCookie('location');

            var user_address = getCookie('address');
            // console.log(user_location);
            // console.log(user_address);
            if (user_location == "" || user_location == 'undefined') {

                if (window.navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                            var lat = position.coords.latitude,
                                lng = position.coords.longitude,
                                latlng = new google.maps.LatLng(lat, lng),
                                geocoder = new google.maps.Geocoder();

                            geocoder.geocode({'latLng': latlng}, function (results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    // console.log(results[0].address_components[3].short_name);
                                    // var city = results[0].address_components[3].short_name;
                                    var city = "";
                                    if (results[1]) {
                                        for (var i = 0; i < results.length; i++) {
                                            if (results[i].types[0] === "locality") {
                                                var city = results[i].address_components[0].short_name;
                                                var state = results[i].address_components[2].short_name;
                                                // console.log(city + ", " + state);
                                            }
                                        }
                                    }

                                    setCookie("city", city.toLowerCase(), 15);
                                    setCookie("location", city, 1);
                                    setCookie("address", results[0].formatted_address, 1);
                                    setCookie("city_lat_long", lat + ',' + lng, 15);
                                    setCookie("lat", lat, 15);
                                    setCookie("long", lng, 15);
                                    setCookie("item_demand", 'ondemand', 15);
                                    var item_demand = 'ondemand';
                                    getNearestDishes(lat, lng, item_demand);
                                    getNearestChef(lat, lng);
                                    getTrendingItem(lat, lng, item_demand);
                                    search(lat,lng);
                                    // get_best_dishes();
                                    // get_trend_chef();
                                    // get_all_chef();
                                    $('#address').val(results[0].formatted_address);

                                    // footer_cuisines_link();

                                    //console.log(city);
                                    if (results[1]) {

                                    } else {
                                        console.log("No reverse geocode results.")
                                    }
                                } else {
                                    console.log("Geocoder failed: " + status)
                                }
                            });
                        },
                        function () {
                                    console.log("Geolocation not available.")
                                    setCookie("city", "mexico city", 15);
                                    setCookie("location", "Mexico City", 1);
                                    setCookie("address", "Mexico City, CDMX, Mexico", 1);
                                    setCookie("city_lat_long", "19.4326077,-99.13320799999997", 15);
                                    setCookie("lat", "19.4326077", 15);
                                    setCookie("long", "-99.13320799999997", 15);
                                    setCookie("item_demand", 'ondemand', 15);
                                    var item_demand = 'ondemand';
                                    var lat = "19.4326077";
                                    var lng = "-99.13320799999997";
                                    getNearestDishes(lat, lng, item_demand);
                                    getNearestChef(lat, lng);
                                    getTrendingItem(lat, lng, item_demand);
                                    search(lat,lng);
                        });

                }
            } else {

                $('#address').val(user_address);
                var lat = getCookie('lat');
                var lang = getCookie('long');
                var item_demand = getCookie('item_demand');

                if(item_demand == 'planahead'){
                    $('#planahead').addClass('btn-white');
                    $('#planahead').removeClass('btn-order');
                    $('#ondemand').addClass('btn-order');
                    $('#ondemand').removeClass('btn-white');
                } else {
                    $('#ondemand').addClass('btn-white');
                    $('#ondemand').removeClass('btn-order');
                    $('#planahead').addClass('btn-order');
                    $('#planahead').removeClass('btn-white');

                }

                getNearestDishes(lat, lang,item_demand);
                getNearestChef(lat, lang);
                getTrendingItem(lat, lang,item_demand);
                search(lat,lang);

                // setCookie("item_demand", 'ondemand', 15);

                // search(user_location);
                // get_best_dishes();
                // get_trend_chef();
                // get_all_chef();
                // footer_cuisines_link();
            }

            if (user_address != "") {
                $('#locality').val(getCookie('city'));

            }

        });

        function getNearestDishes(lat, lang,item_demand) {
            var lat = lat;
            var lang = lang;

            $.ajax({
                url: "{{URL::to('nearest-items')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "lat": lat,
                    "lang": lang,
                    "item_demand":item_demand
                },
                beforeSend: function () {
                    $("#loading").css('display', 'block');
                },
                success: function (data) {
                    console.log(data);
                    var value = data.value.item;
                    var count = data.value.count;
                    var html = '';
                    if (data.status == true) {

                        html += '<div class="row">';
                        $.each(value, function (i, item) {
                            html += '<div class="col-md-3">' +
                                '<a href="'+item.url_data+'"><div class="bestdishes-box"><div class="bestdishes-img progressive">' +
                                '<div class="min-delivery">' + item.item_preparation_time + ' min</div> ' +
                                '<img data-progressive="' + item.item_image + '" src="' + item.item_image + '" class="progressive__img progressive--not-loaded img-fluid" alt="">' +
                                '<div class="favorites"> <i class="fa fa-heart-o" aria-hidden="true"></i> </div></div>' +
                                '<div class="bestdishes-info">' +
                                '<h6>' + item.item_name + '</h6>' +
                                '<p class="text-grey">' + item.category_name + '</p>' +
                                '<div class="row align-items-center">' +
                                '<div class="col-6"><div class="review-box"><span class="icon-star _537e4"></span>' +
                                '<span><i class="fa fa-star" aria-hidden="true"></i> 4.3</span></div></div>' +
                                '<div class="col-6 text-right "><div class="prise">$ ' + item.item_price + ' </div></div>' +
                                '</div></div></div></a></div>';
                        });
                        if (count > 0) {

                            html += '<div class="col-md-3"><a href="near-by-dishes"><div class="addmore">+' + count + ' More</div></a></div>';
                        }
                        html += '</div>';
                        $('#near_by_dishes').html(html);

                    } else {
                        html += '<div class="col-md-12 text-center" >No Item Found.</div>'
                        $('#near_by_dishes').html(html);
                    }
                },
                complete: function () {
                    $("#loading").css('display', 'none');
                    setTimeout(function(){
                        $('#near_by_dishes .progressive--not-loaded').addClass('progressive--is-loaded').removeClass('progressive--not-loaded');
                    },1000);
                }
            });
        }

        function getNearestChef(lat, lang) {
            var lat = lat;
            var lang = lang;

            $.ajax({
                url: "{{URL::to('nearest-chefs')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "lat": lat,
                    "lang": lang
                },
                beforeSend: function () {
                    $(".chef_section").css('display', 'block');
                },
                success: function (data) {
                    console.log(data);
                    var value = data.value;
                    var html = '';
                    if (data.status == true) {
                        html += '<div class="owl-carousel">'
                        $.each(value, function (i, item) {
                            html += '<div class="items">\n' +
                                '<a href="chef/' + item.url_data + '"> ' +
                                '<div class="media"><div class="mr-4 near-checf-img progressive">' +
                                '<img src="' + item.profile_img + '" class="progressive__img progressive--not-loaded img-fluid" alt="user"></div>' +
                                '<div class="media-body trend-info"><h4 class="mt-0 mb-2">' + item.name + '</h4><h6>' + item.cusines + '</h6></div>' +
                                '</div></a></div>'
                        });
                        html += '</div>'
                        $('.nearbychefs').html(html);
                        $('.owl-carousel').owlCarousel({
                            loop: true,
                            refresh: true,
                            margin: 50,
                            responsiveClass: true,
                            responsive: {
                                0: {
                                    items: 1,
                                    nav: true
                                },
                                600: {
                                    items: 3,
                                    nav: false
                                },
                                1000: {
                                    items: 3,
                                    nav: true,
                                    loop: false
                                }
                            }
                        });
                    } else {
                        html += '<div class="row" > <div class="col-md-12 text-center" >No Chefs Found.</div></div>';
                        $('.nearbychefs').html(html);
                    }

                },
                complete: function () {
                    $(".chef_section").css('display', 'none');
                    setTimeout(function(){
                        $('.nearbychefs .progressive--not-loaded').addClass('progressive--is-loaded').removeClass('progressive--not-loaded');
                    },1400);
                }
            });
        }

        function getTrendingItem(lat, lang,item_demand) {
            var lat = lat;
            var lang = lang;

            $.ajax({
                url: "{{URL::to('nearest-trending-item')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "lat": lat,
                    "lang": lang,
                    "item_demand":item_demand
                },
                beforeSend: function () {
                    $(".trending_section").css('display', 'block');
                },
                success: function (data) {
                    var value = data.value.item;
                    var count = data.value.count;
                    var html = '';
                    if (data.status == true) {

                        $.each(value, function (i, item) {

                          var chefUrl = item.chef_data.name.replace(' ','-');
                              chefUrl = chefUrl.toLowerCase();

                            html += '<div class=" col-md-4"><a href="chef/' + chefUrl + '"><div class="media grid-list">' +
                                '<div class="trending-img mr-3 progressive"><img class="progressive__img progressive--not-loaded img-fluid" src="' + item.item_image + '"alt=""></div>' +
                                '<div class="media-body"><h5 class="mt-0">' + item.item_name + '</h5>' +
                                '<p>' + item.category_name + '</p><hr class="border-short">' +
                                '<div class="row align-items-center"><div class="col">' +
                                '<div class="prise">$ ' + item.item_price + '</div></div>' +
                                '<div class="col text-right pr-0"></div></div>' +
                                '</div></div></a></div>';
                        });
                        if (count > 0) {

                            html += '  <div class="col-md-4"><a href="near-by-trending-cuisines"><div class="addmore-cuisines">+' + count + ' More</div></a></div>';
                        }
                        $('#near_by_best_dishes').html(html);
                    } else {
                        html += '<div class="col-md-12 text-center" >No Item Found.</div>';
                        $('#near_by_best_dishes').html(html);
                    }
                },
                complete: function () {
                    $(".trending_section").css('display', 'none');
                    setTimeout(function(){
                        $('#near_by_best_dishes .progressive--not-loaded').addClass('progressive--is-loaded').removeClass('progressive--not-loaded');
                    },1200);
                }
            });
        }
    </script>
    <script src="{{URL::to('public/Frontassets/js/jquery.typeahead.min.js')}}"></script>
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <script>
        $(document).on('keyup','#search',function () {
                var value = $(this).val();

            if($('.tt-menu').find('.tt-suggestion').length == 0 && $(this).val().length != 0) {
                $('.tt-menu').show();
                $(".tt-dataset:nth-child(1)").text('No Results Found');
            }
        });

        function search(lat,lang) {
            $('#no-delivery').html('');

            $.ajax({
                url: "{{URL::to('search')}}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "lat": lat,
                    "lang": lang,
                },
                success: function (data) {

                    data = data.value;
                    if (data.length == 0) {
                        $('#no-delivery').html('We don\'t deliver to your address yet');
                    }


                    var chef = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        local: data.chef
                    });

                    var item = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        local: data.item
                    });

                    var cuisines = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        local: data.cuisines
                    });

                    $('#search').typeahead('destroy');
                    chef.clearPrefetchCache();
                    item.clearPrefetchCache();
                    cuisines.clearPrefetchCache();


                    $('#search').typeahead({
                            highlight: true
                        },
                        {
                            name: 'search',
                            displayKey: 'name',
                            source: chef.ttAdapter(),
                            templates: {
                                header: '<h4 class="league-name">Chef</h4>',
                            }
                        },
                        {
                            name: 'search',
                            displayKey: 'name',
                            source: item.ttAdapter(),
                            templates: {
                                header: '<h4 class="league-name">Food</h4>'

                            }
                        },
                        {
                            name: 'search',
                            displayKey: 'name',
                            source: cuisines.ttAdapter(),
                            templates: {
                                header: '<h4 class="league-name">Cuisine</h4>'
                            }


                        }
                        ).bind("typeahead:select", function(obj, type, name) {
                        $('#type').val(type.type);
                        var input = document.getElementById("search");
                        event.preventDefault();
                        if (event.keyCode === 13) {
                            document.getElementById("search-button").click();
                        }

                    });
                    $(document).find('.tt-input').focus();
                }
            });
        }

        $(document).on('click','#search-button',function () {
            var lat = getCookie('lat');
            var lang = getCookie('long');

            var search_words = $("#search").val();
            var search_type =  $('#type').val();
            var search = (search_words).toLowerCase();

            setCookie('search_words', search, 30);
            setCookie('search_type', search_type, 30);

            if(search_type == 'chef'){
                var url = search.replace(/ +/g,'-');

                window.location.href = site_url+'/chef/'+url;
            } else {
                var url = ('?search='+search).toLowerCase();
                window.location.href = site_url+'/search/'+url;
            }
            //


        });

        $(document).on('click','.item_demand',function () {
                var value = $(this).data('value');
            setCookie("item_demand", value, 15);
                if(value == 'planahead'){
                    $('#planahead').addClass('btn-white');
                    $('#planahead').removeClass('btn-order');
                    $('#ondemand').addClass('btn-order');
                    $('#ondemand').removeClass('btn-white');
                    var lat = getCookie('lat');
                    var lang = getCookie('long');
                    var item_demand = getCookie('item_demand');
                    getNearestDishes(lat, lang,item_demand);
                    // getNearestChef(lat, lang);
                    getTrendingItem(lat, lang,item_demand);
                } else {
                    $('#ondemand').addClass('btn-white');
                    $('#ondemand').removeClass('btn-order');
                    $('#planahead').addClass('btn-order');
                    $('#planahead').removeClass('btn-white');
                    var lat = getCookie('lat');
                    var lang = getCookie('long');
                    var item_demand = getCookie('item_demand');
                    getNearestDishes(lat, lang,item_demand);
                    // getNearestChef(lat, lang);
                    getTrendingItem(lat, lang,item_demand);
                }
        });

        // for area explorer concept start

        $(document).on('click','.areaExplore',function(){

            var availability = $(this).data('area');
            $('#areaId').val($(this).data('id'));

            // if(availability === 'yes'){
            //
            //   $('html, body').animate({
            //      scrollTop: ($('.banner-box').offset().top)
            //  });
            //
            // } else {
            //   $('#areaModal').modal();
            // }
        });
        // for area explorer concept end
    </script>
@endsection
