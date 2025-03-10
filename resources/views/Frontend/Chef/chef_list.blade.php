@extends('layouts.frontend')
@section('front_title') Chef List @endsection
@section('front_css')
@endsection
@section('content')
    <section class="chef-header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="text-white">Chef List</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="bestdishes">
                <div class="row">
                    <div class="col-md-2">
                        <div class="cuisines-box">
                            <h5>Filters Cuisines</h5>
                            <ul>
                                @foreach($cuisines as $row)

                                    <li>
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input cuisines_check" value="{{$row->id}}" name="cuisine[]"
                                                   id="cuisinesfood{{$row->id}}">
                                            <label class="custom-control-label"
                                                   for="cuisinesfood{{$row->id}}">{{$row->cuisine_name}}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-10">
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
                        <div class="chef_data">
                            <div class="row">
                                @foreach($user as $row)
                                    <div class="col-md-4">
                                        <a href="{{URL::to('chef/'.strtolower(str_replace(' ','-',$row->name)))}}">
                                            <div class="chef-list-box">
                                                <div class="media">
                                                    <div class="mr-4 near-checf-img progressive">
                                                        <img src="{{URL::to('public/upload/user/'.$row->profile_img)}}"
                                                             class="progressive__img progressive--not-loaded img-fluid"
                                                             alt="">
                                                    </div>
                                                    <div class="media-body trend-info">
                                                        <h5 class="mt-0 mb-2">{{$row->name}}</h5>
                                                        <h6>{{$row->cusines}}</h6>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="review-box">
                                                                    <span class="icon-star _537e4"></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i> 4.3</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="min-dlivery">
                                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                    {{$row->distance}}km
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('front_js')
    <script>

        $(document).ready(function () {
            var lat = getCookie('lat');
            var long = getCookie('long');
            var cuisine = [];
            getNearestChef(lat, long,cuisine);
        });

        function getNearestChef(lat, long,cuisine) {

            $.ajax({
                url: "{{URL::to('nearest-chef-list')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "lat": lat,
                    "lang": long,
                    "cuisine" : cuisine
                },
                beforeSend: function () {
                    $(".chef_section").css('display', 'block');
                },
                success: function (data) {
                    console.log(data);
                    var value = data.value;
                    var html = '';
                    if (data.status == true) {
                        html += '<div class="row">';

                        $.each(value, function (i, item) {
                            html += '<div class="col-md-4">' +
                                '<a href="chef/' + item.url_data + '"> ' +
                                '<div class="chef-list-box"><div class="media"><div class="mr-4 near-checf-img progressive">' +
                                '<img src="' + item.profile_img + '" class="progressive__img progressive--not-loaded img-fluid" alt="">' +
                                '</div><div class="media-body trend-info"><h5 class="mt-0 mb-2">' + item.name + '</h5><h6>' + item.cusines + '</h6>' +
                                '<div class="row"><div class="col-6"><div class="review-box"><span class="icon-star _537e4"></span>' +
                                '<span><i class="fa fa-star" aria-hidden="true"></i> 4.3</span></div></div>' +
                                '<div class="col-6 pl-0"><div class="min-dlivery"><i class="fa fa-map-marker" aria-hidden="true"></i> ' + item.distance + ' km' +
                                '</div></div></div></div></div></div></a></div>';
                        });
                        html += '</div>';

                        $('.chef_data').html(html);
                    } else {
                        html += '<div class="row" > <div class="col-md-12 text-center" >No Chefs Found.</div></div>';
                        $('.chef_data').html(html);
                    }
                },
                complete: function () {
                    $(".chef_section").css('display', 'none');
                    setTimeout(function () {
                        $('.chef_data .progressive--not-loaded').addClass('progressive--is-loaded').removeClass('progressive--not-loaded');
                    }, 1200);
                }
            });
        }

        $(".cuisines_check").change(function(){
            var favorite = [];
            var lat = getCookie('lat');
            var long = getCookie('long');

            $.each($("input[name='cuisine[]']:checked"), function(){
                favorite.push($(this).val());
            });

            getNearestChef(lat, long,favorite);

        });


    </script>
@endsection
