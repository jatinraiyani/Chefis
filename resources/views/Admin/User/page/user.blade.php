@extends('layouts.admin')
@section('title')
    Users
@endsection
@section('css')

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/css/core/colors/palette-gradient.min.css')}}">
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Users</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Users</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{URL::to('admin/user/create/user')}}">
                    <button class="btn btn-danger round btn-glow px-2"
                            type="button" aria-expanded="false"> + Add User
                    </button>
                </a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
                {!! Session::get('message') !!}
            @endif
        </div>
    </div>

    <div class="content-body">
        <section id="file-export">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Users Table</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            {{--<div class="heading-elements">--}}
                            {{--<ul class="list-inline mb-0">--}}
                            {{--<li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
                            {{--<li><a data-action="expand"><i class="ft-maximize"></i></a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <table class="table table-striped table-bordered file-export">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Payment Methods</th>
                                        <th>Total Money Spent</th>
                                        <th>Monthly Money Spent</th>
                                        <th>Last Login Date</th>
                                        <th>Status</th>
                                        <th>Profile Pic</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <div style="display: none">{{$i=1}}</div>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$row->name}} </td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone_number}}</td>
                                            <td>{{$row->payment_method == '' ? '-' : $row->payment_method}}</td>
                                            <td>$ {{number_format($row->totalSpend)}}</td>
                                            <td>$ {{number_format($row->totalMonthlySpend)}}</td>
                                            <td>{{$row->last_login != '' ? \Carbon\Carbon::parse($row->last_login)->format('M d,Y') : '-'}}</td>
                                            <td>
                                                <a href="{{URL::to('admin/user/'.$row->id.'/status')}}">
                                                    <span class="badge {{$row->status == 'active' ? 'badge-success' :'badge-danger'}}">{{$row->status}}</span>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="media-left">
                                                    @if(file_exists(public_path('upload/user/'.$row->profile_img)) && $row->profile_img != '')
                                                        <img src="{{URL::to('public/upload/user/'.$row->profile_img)}}"
                                                             class="img-responsive" alt="user" height="50px" width="50px">
                                                    @else
                                                        <img src="{{URL::to('public/default/default_user.png')}}"
                                                             class="img-responsive"
                                                             alt="user" height="50px" width="50px">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($row->roles->first()->name == 'user' || $row->roles->first()->name == 'chef')
                                                    <a href="{{URL::to('admin/user/'.$row->id)}}"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="View Order"> <i
                                                            class="ft ft-eye"></i></a> &nbsp;
                                                @endif
                                                <a href="{{URL::to('admin/user/'.$row->id.'/edit')}}"
                                                   data-toggle="tooltip"
                                                   data-placement="right" title="Edit User"> <i
                                                        class="ft ft-edit-3"></i></a> &nbsp;
                                                <a href="{{URL::to('admin/user/'.$row->id.'/destroy')}}"
                                                   data-toggle="tooltip"
                                                   data-placement="left" title="Delete User"><i
                                                        class="ft ft-trash-2"></i></a>
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
        </section>
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
