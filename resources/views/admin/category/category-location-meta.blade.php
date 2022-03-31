@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- main content -->
<div class="content-wrapper" ng-controller="AddProductController">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="{{url('/admin')}}"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="javascript:void(0);">Category</a></li>
                <li class="active">Locations</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Add New location</h6>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('admin/save-category-location') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-12">Select Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="">
                                            <option value="">Please Select Category for Location</option>
                                            @foreach ($all_category as $cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" style="font-size: 12px">{{ $errors->first('category_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-12">Select Location</label>
                                        <select id="" name="location_id" class="form-control @error('location_id') is-invalid @enderror">
                                            <option value="">Please Select Location</option>
                                            @foreach ($locations as $item)
                                                <option value="{{ $item->id }}">{{ $item->location_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" style="font-size: 12px">{{ $errors->first('location_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-12">Meta Key</label>
                                        <textarea name="meta_key" id="" cols="30" rows="10" class="form-control  @error('meta_key') is-invalid @enderror"></textarea>
                                        <span class="text-danger" style="font-size: 12px">{{ $errors->first('meta_key') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-12">Meta Description</label>
                                        <textarea name="meta_description" id="" cols="30" rows="10" class="form-control  @error('meta_description') is-invalid @enderror"></textarea>
                                        <span class="text-danger" style="font-size: 12px">{{ $errors->first('meta_description') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 26px;">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="overlay-spinner">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">List of Locations</h6>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive action-table">
                            <table id="table-recom" class="display table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        {{-- <th width="10">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        </th> --}}
                                        <th scope="col">Id</th>
                                        <th scope="col">Location Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <th><input type="checkbox" class="form-check-input" id="exampleCheck1"></th>
                                        <td>ID</td>
                                        <td>Location Name</td>
                                        <th></th>
                                    </tr>
                                </tfoot> --}}
                                <tbody>
                                    @foreach ($locations as $item)
                                        <tr>
                                            {{-- <td>
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            </td> --}}
                                            <td scope="col">{{ $item->id }}</td>
                                            <td scope="col">{{ $item->location_name }}</td>
                                            <td>
                                                <a href="{{ url('admin/category-location-view/'.$item->id) }}" class="btn btn-info">View</a>
                                                {{-- <button type="button"  data-toggle="modal" data-target="#exampleModalCenterTitle" id="delete_btn" data-pid ="" class="btn delete  btn-danger">Edit</button>
                                                <button type="button"  data-toggle="modal" data-target="#exampleModalCenterTitle" id="delete_btn" data-pid ="" class="btn delete  btn-danger">Delete</button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenterTitle" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Are you sure you want to remove this product from Recommended Section?</p>
                </div>
                <div class="modal-footer">

                    <form id="delete-record" class="form-inline">
                        @csrf
                        <input type="hidden" name="id" class="confirm_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes.Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('layouts.admin_layout.admin_footer')
    <!-- /footer -->
</div>
<!-- /main content -->
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type='text/javascript'>

    $(document).on("click", '#delete_btn',function (e) {
        var id = $(this).data('pid');
        $(".confirm_id").val(id);
    });

    $('#delete-record').on('submit', function(event){
        $("#overlay-spinner").fadeIn(500);　
        event.preventDefault();

        var form_data = $(this).serialize();

        $.ajax({
            url:"/admin/delete-recommended-product",
            method:"POST",
            data:form_data,
            success:function(data){

                if(data['success'] === true){
                    $('#exampleModalCenterTitle').modal('toggle');
                    $("#overlay-spinner").fadeOut(500);　
                    toastr.success(data.message);
                    loadAllRecommendedProduct();
                }


            }
        });
    });

    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;

          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;

          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;

          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example tfoot td').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );

        // DataTable
        var table = $('#example').DataTable({
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            },
            buttons: [
                {
                    text: 'My button',
                    action: function ( e, dt, node, config ) {
                        alert( 'Button activated' );
                    }
                }
            ]
        });

    });
</script>

@endsection
