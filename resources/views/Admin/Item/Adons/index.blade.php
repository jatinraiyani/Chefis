@extends('layouts.admin')
@section('title')
    Item Adons
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
            <h3 class="content-header-title mb-0 d-inline-block">Adons</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/item')}}">Items</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Adons</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{URL::to('admin/item/'.$id.'/adons/create')}}">
                    <button class="btn btn-danger round btn-glow px-2"
                            type="button" aria-expanded="false"> + Add Adons
                    </button>
                </a>

            </div>
        </div>
    </div>
    <section id="file-export">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Adons Table</h4>
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
                                    <th>Title</th>
                                    <th>Box Type</th>
                                    <th>Mandatory Or Not</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td rowspan="{{count($row->subadons) + 1}}">{{$row->id}}</td>
                                         <td rowspan="{{count($row->subadons) + 1}}">{{$row->title}}</td>
                                        <td style="font-weight: bold">{{$row->box_type == 'radio' ? 'Single Select' : 'Multiple Select' }}</td>
                                        <td style="font-weight: bold">{{$row->box_validation}}</td>
                                        <td><span class="badge {{$row->status == 'Active' ? 'badge-success' :'badge-danger'}}">{{$row->status}}</span></td>
                                        <td rowspan="{{count($row->subadons) + 1}}">
                                            <a href="{{URL::to('admin/item/'.$id.'/adons/'.$row->id.'/edit')}}"
                                               data-toggle="tooltip"
                                               data-placement="right" title="Edit Item Adons "> <i
                                                    class="ft ft-edit-3"></i></a> &nbsp;
                                            <a href="{{URL::to('admin/item/'.$id.'/adons/'.$row->id.'/destroy')}}"
                                               data-toggle="tooltip"
                                               data-placement="left" title="Delete Item Adons "><i
                                                    class="ft ft-trash-2"></i></a>
                                        </td>

                                    </tr>
                                    @foreach($row->subadons as $item)
                                        <tr>

                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td><span class="badge {{$item->status == 'Active' ? 'badge-success' :'badge-danger'}}">{{$item->status}}</span></td>



                                        </tr>
                                    @endforeach
                                @endforeach
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
                text: "You will not be able to recover this Item!",
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
                        swal("Deleted!", "Your Item has been deleted.", "success");
                        window.location.href = "item/" + id + "/destroy";
                    } else {
                        swal("Cancelled", "Your Item is safe", "error");
                    }
                });

        });
    </script>
@endsection
