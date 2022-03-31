@php
    use App\Models\CategoryLocationMeta;
    use App\Models\CategoryLocationRelation;
@endphp
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
        <div id="overlay-spinner">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">Location Name:{{ $location->location_name }}</h6>
                    </div>
                    @if ($allCategory)
                        <div class="panel-body">
                            <div class="table-responsive action-table">
                                <table id="table-recom" width="100%" border="0" cellspacing="0" cellpadding="0"
                                    class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Meta Key</th>
                                            <th scope="col">Meta Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                    
                                        @foreach ($allCategory as $key=> $item)
                                        @php
                                            //$getData = CategoryLocationMeta::find($item->id);
                                            //dd($getData->id);
                                            //$getCatRelId = CategoryLocationRelation::find($getData->location_cat_rel_id);
                                            //dd($getCatRelId->id);
                                        @endphp
                                            <tr>
                                                <td scope="col">{{ ++$key}}</td>
                                                <td scope="col">{{ $item->cat_title }}</td>
                                                <td scope="col">{{ $item->meta_key }}</td>
                                                <td scope="col">{{ $item->meta_description }}</td>
                                                <td>

                                                    <button type="button" data-toggle="modal"
                                                        data-target="#editModal" id="edit_btn" data-id="{{ $item->id }}"  data-key="{{ $item->meta_key }}"  data-description="{{ $item->meta_description }}"
                                                        class="btn delete  btn-info">Edit</button>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#deleteModal" id="delete_btn" data-id="{{ $item->id }}"
                                                        class="btn delete  btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div  class="panel-body">
                            No Data Found
                        </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark mb-2 p-2"></p>
                    <form id="edit-record" class="form-inline">
                        @csrf
                        <div class="p-2">
                            <input type="hidden" name="id" class="edit_id">
                            <div class="form-group">
                                <label for="meta_key">Meta Key:</label>
                                <input type="text" id="meta_key" name="meta_key" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description:</label>
                                <textarea type="text" id="meta_description" name="meta_description" class="form-control"></textarea>
                            </div>
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary radius-50 text-13" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary radius-50 bg-theme border-theme text-white text-13">Submit</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this content?</p>
                </div>
                <div class="modal-footer">

                    <form id="delete-record" class="form-inline">
                        @csrf
                        <input type="hidden" name="id" class="delete_id">
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

    $(document).on("click", '#edit_btn',function (e) {
        var edit_id = $(this).data('id');
        var meta_key = $(this).data('key');
        var meta_description = $(this).data('description');
       
        $(".edit_id").val(edit_id);
        $("#meta_key").val(meta_key);
        $("#meta_description").val(meta_description); 
    });

    $('#edit-record').on('submit', function(event){
        $("#overlay-spinner").fadeIn(1000);　
        event.preventDefault();
        
        var form_data = $(this).serialize();

        console.log(form_data);
        
        $.ajax({
            url:"/admin/edit-loc-cat-content",
            method:"POST",
            data:form_data,
            success:function(data){
            
                if(data['success'] === true){
                    $('#editModal').modal('toggle');
                    $("#overlay-spinner").fadeOut(1000);　
                    toastr.success(data.message); 
                    window.location.reload()
                }else{
                    toastr.error(data.message); 
                }

            }
        });
    }); 

    $(document).on("click", '#delete_btn',function (e) {
        var id = $(this).data('id');
        console.log(id);
        $(".delete_id").val(id); 
    });
        
    $('#delete-record').on('submit', function(event){
        $("#overlay-spinner").fadeIn(1000);　
        event.preventDefault();
        
        var form_data = $(this).serialize();
        
        $.ajax({
            url:"/admin/delete-loc-cat-content",
            method:"POST",
            data:form_data,
            success:function(data){
            
                if(data['success'] === true){
                    $('#deleteModal').modal('toggle');
                    $("#overlay-spinner").fadeOut(1000);　
                    toastr.success(data.message); 
                    window.location.reload()
                }else{
                    toastr.error(data.message); 
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

@endsection