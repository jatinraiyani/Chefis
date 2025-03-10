@extends('layouts.admin')
@section('title')
    Chef User View
@endsection
@section('css')

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/pages/users.min.css')}}">
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Chef User View</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/user-chef')}}">Chef User</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Chef User Details</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div id="user-profile">
        <div class="row">
            <div class="col-12">
                <div class="card profile-with-cover">
                    <div class="card-img-top img-fluid bg-cover height-300"
                         style="background: url('{{URL::to('public/Adminassets/images/carousel/25.jpg')}}') 50%;"></div>
                    <div class="media profil-cover-details w-100">
                        <div class="media-left pl-2 pt-2">
                            <a href="#" class="profile-image">
                                @if(file_exists(public_path('upload/user/'.$data['profile_img'])) && $data['profile_img'] != '')
                                    <img src="{{URL::to('public/upload/user/'.$data['profile_img'])}}"
                                         class="rounded-circle img-border height-100" alt="user">
                                @else
                                    <img src="{{URL::to('public/default/default_user.png')}}"
                                         class="rounded-circle img-border height-100"
                                         alt="user">
                                @endif
                            </a>
                        </div>
                        <div class="media-body pt-3 px-2">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title">{{$data['name']}}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Chef Account Details</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0">
                            <div class="row">

                                <div class="col-md-4 col-4 text-center">
                                    <h4 class="font-large-2 text-bold-400">{{number_format($totalItem )}}</h4>
                                    <p class="blue-grey lighten-2 mb-0">Total Items</p>
                                </div>
                                <div class="col-md-4 col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                    <h4 class="font-large-2 text-bold-400">{{number_format($totalOrder)}}</h4>
                                    <p class="blue-grey lighten-2 mb-0">Total Orders</p>
                                </div>
                                <div class="col-md-4 col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                    <h4 class="font-large-2 text-bold-400">$ {{number_format($totalpurchase)}}</h4>
                                    <p class="blue-grey lighten-2 mb-0">Total Income</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Orders List</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <table class="table table-striped table-bordered file-export">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Chef Name</th>
                                    <th>Order Number</th>
                                    <th>Order Qty</th>
                                    <th>Order Total</th>
                                    <th>Order Address</th>
                                    <th>Payment Id</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div style="display: none">{{$i=1}}</div>
                                @foreach($order as $row)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$row->userData->name}} </td>
                                        <td>{{$row->chefData->name}} </td>
                                        <td>{{$row->order_number}} </td>
                                        <td>{{$row->total_qty}} </td>
                                        <td>{{$row->order_final_total}} </td>
                                        <td>{{$row->order_address}} </td>
                                        <td>{{$row->transaction_id}}</td>
                                        <td>
                                            {{$row->order_status}}
                                        </td>
                                    </tr>
                                    <div style="display: none">{{$i++}}</div>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
