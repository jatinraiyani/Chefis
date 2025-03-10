@extends('layouts.admin')
@section('title')
    Application Feedback
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
            <h3 class="content-header-title mb-0 d-inline-block">Application Feedback</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Application Feedback</a>
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
                            <h4 class="card-title">Application Feedback Table</h4>
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
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <div style="display: none">{{$i=1}}</div>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$row->name}} </td>
                                            <td>{{$row->email}} </td>
                                            <td>{{$row->subject}} </td>
                                            <td>{{$row->message}} </td>

                                            <td>
                                                <a href="#"
                                                   data-toggle="tooltip" data-id="{{$row->id}}"
                                                   data-placement="left" title="Delete Feedback" class="cancel-button"><i
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
                text: "You will not be able to recover this Feedback Details!",
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
                        swal("Deleted!", "Your Feedback Details has been deleted.", "success");
                        window.location.href = "feedback/" + id + "/destroy";
                    } else {
                        swal("Cancelled", "Your Feedback Details is safe", "error");
                    }
                });

        });
    </script>
@endsection
