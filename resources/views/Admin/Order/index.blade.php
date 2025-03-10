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
@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Orders</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Orders</a>
                        </li>
                    </ol>
                </div>
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
                            <h4 class="card-title">Orders Table</h4>
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
                                        <th>User Name</th>
                                        <th>Chef Name</th>
                                        <th>Order Number</th>
                                        <th>Order Qty</th>
                                        <th>Order Total</th>
                                        <th>Order Address</th>
                                        <th>Payment Id</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <div style="display: none">{{$i=1}}</div>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$row->userData->name}} </td>
                                            <td>{{$row->chefData->name}} </td>
                                            <td>{{$row->order_number}} </td>
                                            <td>{{$row->total_qty}} </td>
                                            <td>{{$row->order_final_total}} </td>
                                            <td>{{$row->order_address}} </td>
                                            <td>{{$row->transaction_id}}</td>
                                            <td class="status{{$row->id}}">
                                              @if($row->order_status == 'pending')
                                              <h5><span class="badge badge-danger order_status" data-id="{{$row->id}}" data-status="canceled_by_admin">Cancel</span></h5>
                                              @endif
                                              @if($row->order_status == 'confirm')
                                              <h5><span class="badge badge-info">Confirmed</span>
                                              @endif
                                              @if($row->order_status == 'pack')
                                              <h5><span class="badge badge-info">Waiting For Driver</span></h5>
                                              @endif
                                              @if($row->order_status == 'driver_accept')
                                              <h5><span class="badge badge-info">Driver Accepted</span></h5>
                                              @endif
                                              @if($row->order_status == 'driver_pickup')
                                              <h5><span class="badge badge-info">Picked By Driver</span></h5>
                                              @endif
                                              @if($row->order_status == 'delivered')
                                              <h5><span class="badge badge-info">Delivered</span></h5>
                                              @endif
                                              @if($row->order_status == 'canceled_by_user')
                                              <h5><span class="badge badge-danger">Canceled By User</span></h5>
                                              @endif
                                              @if($row->order_status == 'canceled_by_admin')
                                              <h5><span class="badge badge-danger">Canceled</span></h5>
                                              @endif
                                              @if($row->order_status == 'canceled_by_chef')
                                              <h5><span class="badge badge-danger">Canceled By Chef</span></h5>
                                              @endif
                                            </td>

                                            <td>
                                                <a href="{{URL::to('admin/order/'.$row->id)}}"
                                                   data-toggle="tooltip"
                                                   data-placement="right" title="View Invoice"> <i
                                                        class="ft ft-eye"></i></a> &nbsp;
                                                {{--<a href="{{URL::to('admin/item/'.$row->id.'/edit')}}"--}}
                                                   {{--data-toggle="tooltip"--}}
                                                   {{--data-placement="top" title="Edit Order"> <i--}}
                                                        {{--class="ft ft-edit-3"></i></a> &nbsp;--}}
                                                <!-- <a href="#"
                                                   data-toggle="tooltip" data-id="{{$row->id}}"
                                                   data-placement="left" title="Delete Order" class="cancel-button"><i
                                                        class="ft ft-trash-2"></i></a> -->
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
    <script src="{{URL::asset('public/Adminassets/vendors/js/extensions/sweetalert.min.js')}}"
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
    <script>
        $('.cancel-button').on('click',function(){
            var id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Order!",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No, cancel plx!",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Yes, delete it!",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            })
                .then((isConfirm) => {
                    if (isConfirm) {
                        swal("Deleted!", "Your Order has been deleted.", "success");
                        window.location.href = "order/" + id + "/destroy";
                    } else {
                        swal("Cancelled", "Your Order is safe", "error");
                    }
                });

        });
        $(document).on('click','.order_status',function(){

                var id = $(this).data('id');
                var status = $(this).data('status');

            swal({
                title: "Are you sure?",
                text: "Want to change Order Status?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No, cancel plx!",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Yes, Change it!",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            })
                .then((isConfirm) => {
                    if (isConfirm) {
                        $.ajax({
                            url: "{{URL::to('admin/order/status')}}",
                            type: "post",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "order_status":status,
                                "id":id
                            },
                            success: function (data) {
                              if(data.name == 'canceled_by_admin'){
                                  var html = '<h5><span class="badge badge-danger">Canceled</span></h5>';
                                  $('.status'+id+'').html(html);
                              }
                                swal("Success!", "Your Order Status has been Changed.", "success");
                            }
                        });

                    } else {
                        $('.order_status').val(status);
                        swal("Cancelled", "Your Order Status is not change", "error");
                    }
                });

        });

    </script>
@endsection
