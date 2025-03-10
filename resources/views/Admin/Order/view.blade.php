@extends('layouts.admin')
@section('title')
    Orders
@endsection
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/extensions/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/pages/invoice.min.css')}}">
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Orders Details</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('chef-admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('chef-admin/order')}}">Orders</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Orders Details</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
    <section id="description" class="card">
        <div class="card-header">
            <h4 class="card-title">Order Details</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    {{--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>--}}
                </ul>
            </div>
        </div>

        <div id="invoice-company-details" class="row col-lg-12 col-12">
            <div class="col-md-6 col-sm-12 text-center text-md-left">
                <div class="media">

                    <div class="media-body">
                        <ul class="ml-2 px-0 list-unstyled">
                            <li class="text-bold-800">{{$data->UserData->name}}</li>
                                <li>{{$address->address}}</li>
          @if($address->zipcode)<li>{{$address->zipcode}}</li>@endif
          @if($address->contact_no)<li>{{$address->contact_no}}</li>@endif
                                <li>{{$data['created_at']}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <h4>ORDER NO.</h4>
                <h1 class="pb-3"># {{$data['order_number']}}</h1>
                <label class="badge" style="background-color: {{$color}};font-size: 20px">{{$status}}</label>
            </div>
        </div>

        <div id="invoice-company-details" class="col-sm-12 col-lg-12 col-12">
            <div id="invoice-items-details" class="pt-2">
                <div class="row">
                    <div class="table-responsive col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item & Description</th>
                                <th class="text-right">Rate</th>
                                <th class="text-right">Qty</th>
                                <th class="text-right">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div style="display: none">{{$i = 1}}</div>
                            @foreach($data->orderItem as $row)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>
                                        <p class="text-muted"><img src="{{URL::to('public/upload/item/'.@$row->itemData->item_image)}}" class="img-fluid" style="height: 100px;width: 100px;">  &nbsp;&nbsp;{{$row->item_name}} ({{@$row->chefData->name}})</p>
                                    </td>
                                    <td class="text-right">$ {{$row->item_price}}</td>
                                    <td class="text-right">{{$row->item_qty}}</td>
                                    <td class="text-right">$ {{$row->item_price * $row->item_qty}}</td>
                                </tr>
                                <div style="display: none">{{$i++}}</div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-12 text-center text-md-left">
                        <p class="lead">Payment Methods:</p>
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                    <tr>
                                        <td>Payment Method:</td>
                                        <td class="text-right">{{$data->payment_method}}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment ID:</td>
                                        <td class="text-right">{{$data->transaction_id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status:</td>
                                        <td class="text-right">{{$data->payment_status}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <p class="lead">Total due</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Sub Total</td>
                                    <td class="text-right">$ {{$data['order_subtotal']}}</td>
                                </tr>
                                <tr>
                                    <td>Delivery Charge</td>
                                    <td class="text-right">(+)
                                        $ {{$deliveryCharge}}</td>
                                </tr>
                                <tr class="bg-grey bg-lighten-4" style="font-weight: bold">
                                    <td class="text-bold-800">Grand Total</td>
                                    <td class="text-bold-800 text-right">
                                        $ {{number_format(round($data['order_final_total'],2))}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
@section('plugins')
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/datatable/datatables.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/buttons.flash.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/buttons.html5.min.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('public/Adminassets/vendors/js/tables/buttons.print.min.js')}}"
            type="text/javascript"></script>
@endsection

@section('script')
    <script src="{{URL::asset('public/Adminassets/js/scripts/tables/datatables/datatable-advanced.js')}}"
            type="text/javascript"></script>

@endsection
