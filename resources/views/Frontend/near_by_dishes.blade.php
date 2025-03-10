@extends('layouts.frontend')
@section('front_title') Home @endsection
@section('front_css')
@endsection
@section('content')
    <section class="chef-header">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="title text-white">Nearby <b>Dishes</b></h2></div>
            </div>
        </div>

    </section>
    <section>
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
            <div class="bestdishes">
                <div class="row">
                    @foreach($item as $row)
                        <div class="col-md-3">
                            <a href="{{URL::to('chef/'.strtolower(str_replace(' ','-',@$row->chefData->name)))}}">
                                <div class="bestdishes-box">

                                    <div class="bestdishes-img progressive">
                                        <div class="min-delivery">{{$row->item_preparation_time}} min</div>
                                        <img src="{{URL::to('public/upload/item/'.$row->item_image)}}"
                                             class="progressive__img progressive--not-loaded img-fluid" alt="">
                                        <div class="favorites"><i class="fa fa-heart" aria-hidden="true"></i></div>
                                    </div>
                                    <div class="bestdishes-info">
                                        <h6>{{$row->item_name}}</h6>
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
                    @endforeach
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
            var item_demand = getCookie('item_demand');
            getNearestDishes(lat, long,item_demand);
        });

        function getNearestDishes(lat, lang) {
            var lat = lat;
            var lang = lang;

            $.ajax({
                url: "{{URL::to('near-by-dishes')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "lat": lat,
                    "lang": lang
                },
                beforeSend: function () {
                    $("#loading").css('display', 'block');
                },
                success: function (data) {
                    console.log(data);
                    var value = data.value;
                    var html = '';
                    if (data.status == true) {

                        html += '<div class="row">';
                        $.each(value, function (i, item) {
                            html += '<div class="col-md-3">' +
                                '<a href="' + item.url_data + '"><div class="bestdishes-box"><div class="bestdishes-img progressive">' +
                                '<div class="min-delivery">' + item.distance + ' KM</div> ' +
                                '<img src="' + item.item_image + '" class="progressive__img progressive--not-loaded img-fluid" alt="">' +
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

                        html += '</div>';
                        $('.bestdishes').html(html);
                    } else {
                        html += '<div class="col-md-12 text-center" >No Item Found.</div>'
                        $('.bestdishes').html(html);
                    }
                },
                complete: function () {
                    $("#loading").css('display', 'none');
                    setTimeout(function () {
                        $('.bestdishes .progressive--not-loaded').addClass('progressive--is-loaded').removeClass('progressive--not-loaded');
                    }, 1400);
                }
            });
        }

    </script>

@endsection
