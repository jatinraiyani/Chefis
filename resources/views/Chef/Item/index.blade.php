@extends('layouts.admin')
@section('title')
    Items
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
            <h3 class="content-header-title mb-0 d-inline-block">Items</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('chef-admin/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Items</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <a href="{{URL::to('chef-admin/item/create')}}">
                    <button class="btn btn-danger round btn-glow px-2"
                            type="button" aria-expanded="false"> + Add Items
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
                            <h4 class="card-title">Items Table</h4>
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
                                        {{--<th>Chef Name</th>--}}
                                        <th>Category Name</th>
                                        <th>Item Name</th>
                                        <th>Item Description</th>
                                        <th>Item Price</th>
                                        <th>Item Preparation Time</th>
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
                                            {{--<td>{{$row->chefData->name}} </td>--}}
                                            <td>{{@$row->categoryData->category_name}} </td>
                                            <td>{{$row->item_name}} </td>
                                            <td>{{$row->item_description}} </td>
                                            <td>{{$row->item_price}} </td>
                                            <td>{{$row->item_preparation_time}} Minutes</td>
                                            <td>
                                                <a href="{{URL::to('chef-admin/item/'.$row->id.'/status')}}">
                                                    <span
                                                        class="badge {{$row->status == 'active' ? 'badge-success' :'badge-danger'}}">{{$row->status}}</span>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="media-left">
                                                    @if(file_exists(public_path('upload/item/'.$row->item_image)) && $row->item_image != '')
                                                            <a href="javascript:void(0)" class="myImg viewimgage" data-src="{{URL::to('public/upload/item/'.$row->item_image)}}">view image <i class="ft-eye"></i></a>
                                                    @else
                                                          <a href="javascript:void(0)" class="myImg viewimgage" data-src="{{URL::to('public/default/default_item.jpg')}}">view image
                                                          <i class="ft-eye"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{URL::to('chef-admin/item/'.$row->id.'/adons')}}"
                                                   data-toggle="tooltip"
                                                   data-placement="right" title="Add Item Adons"> <i
                                                        class="ft ft-plus"></i></a> &nbsp;
                                                <a href="{{URL::to('chef-admin/item/'.$row->id.'/edit')}}"
                                                   data-toggle="tooltip"
                                                   data-placement="right" title="Edit Item"> <i
                                                        class="ft ft-edit-3"></i></a> &nbsp;
                                                <a href="javascript:void(0)"
                                                   data-id="{{$row->id}}"
                                                   data-placement="left" title="Delete Item" onclick="deleteitem('{{$row->id}}')" id="cancel-button"><i
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
    <!-- The Modal -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>
@endsection
<style>

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
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
        function deleteitem(id)
        {
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
        }
        var modal = document.getElementById("myModal");
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        $('.myImg').click(function(){
          modal.style.display = "block";
          //modalImg.src = this.src;
          modalImg.src = $(this).data('src');
          captionText.innerHTML = '';
        })

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

    </script>
@endsection
