@extends('layouts.admin')
@section('title')
    Category
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
            <h3 class="content-header-title mb-0 d-inline-block">Category</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Category</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{URL::to('admin/category/create')}}">
                    <button class="btn btn-danger round btn-glow px-2"
                            type="button" aria-expanded="false"> + Add Category
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
                            <h4 class="card-title">Category Table</h4>
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
                                        <th>Chef Name</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <div style="display: none">{{$i=1}}</div>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{@$row->chefData->name}} </td>
                                            <td>{{$row->category_name}} </td>
                                            <td>{{$row->category_description}}</td>
                                            <td>
                                                <a href="{{URL::to('admin/category/'.$row->id.'/status')}}">
                                                    <span
                                                        class="badge {{$row->status == 'active' ? 'badge-success' :'badge-danger'}}">{{$row->status}}</span>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="media-left">
                                                    @if(file_exists(public_path('upload/category/'.$row->category_image)) && $row->category_image != '')
                                                        <img
                                                            src="{{URL::to('public/upload/category/'.$row->category_image)}}"
                                                            class="img-responsive" alt="Category" height="50px"
                                                            width="50px">
                                                    @else
                                                        <img src="{{URL::to('public/default/default_category.png')}}"
                                                             class="img-responsive"
                                                             alt="user" height="50px" width="50px">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{URL::to('admin/category/'.$row->id.'/edit')}}"
                                                   data-toggle="tooltip"
                                                   data-placement="right" title="Edit Category"> <i
                                                        class="ft ft-edit-3"></i></a> &nbsp;
                                                <a href="#"
                                                   data-toggle="tooltip" data-id="{{$row->id}}"
                                                   data-placement="left" title="Delete Category" id="cancel-button"><i
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
        $('#cancel-button').on('click',function(){
            var id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Category!",
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
                        swal("Deleted!", "Your Category Item has been deleted.", "success");
                        window.location.href = "category/" + id + "/destroy";
                    } else {
                        swal("Cancelled", "Your Category Item is safe", "error");
                    }
                });

        });
    </script>
@endsection
