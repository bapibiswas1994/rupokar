@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title"></div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-component">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="/admin/categories">Categories</a></li>
                <li class="active">Edit Category</li>
            </ul>
            <ul class="breadcrumb-elements">
                <li><a href="{{URL::to('/admin/categories')}}"><i class="icon-comment-discussion position-left"></i> Category List</a></li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content">
        <!-- Form validation -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <form class="form-horizontal form-validate-jquery" action="{{url('/admin/edit-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="content-group">
                        <legend class="text-bold">Basic inputs</legend>
                        <!-- Basic text input -->
                        <div class="form-group">
                            <label class="control-label col-lg-3">Category Title<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="title" class="form-control" required="required" placeholder="input title here.." value="{{$category->cat_title}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">Short Description<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="sdesc" class="form-control" required="required" placeholder="Default textarea">{{$category->cat_short_desc}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">Long Description <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="ldesc" class="form-control" required="required" placeholder="Default textarea">{{$category->cat_long_desc}}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="old_image" value="{{$category->cat_image}}">
                        <div class="form-group">
                            <label class="control-label col-lg-3">Basic file uploader <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="file" name="cat_image" class="form-control"  accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">Meta Key<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="metakey" class="form-control" required="required" placeholder="input title here.." value="{{$category->cat_meta_key}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3">Meta Description <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea rows="5" cols="5" name="metadesc" class="form-control" required="required" placeholder="Default textarea"> {{$category->cat_meta_desc}}
                                </textarea>
                            </div>
                        </div>
                        <!-- /basic text input -->
                    </fieldset>
                    <div class="text-right">
                        <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form validation -->
        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2020. <a href="https://zeropower.com">Zero Power</a> by <a href="https://zeropower.com" target="_blank">National Solar</a>
        </div>
        <!-- /footer -->
    </div>
    <!-- /content area -->
</div>
<!-- /main content -->
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
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
