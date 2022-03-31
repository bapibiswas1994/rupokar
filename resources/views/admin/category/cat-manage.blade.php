@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- main content -->
<div class="content">
    <!-- Page header -->
    <div class="page-header">
            <div class="page-header-content">
                <div class="page-title"></div>
            </div>
            <div class="breadcrumb-line breadcrumb-line-component">
                <ul class="breadcrumb">
                    <li><a href="/admin"><i class="icon-home2 position-left"></i> Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li class="active">Category Management</li>
                </ul>
            </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">View all Category<span class="text-blue">{{--$name--}}</span></h6>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive ">
                                <table id="cat_mag_tbl" class="display table-bordered " style="width:100%">
                                    <thead>
                                    <tr>
                                        {{-- <th width="10">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        </th> --}}
                                        <th scope="col">ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">HSN Code</th>
                                        <th scope="col">Service & Installation(Yes/No)</th>
                                        <th scope="col">Service & Installation Charges(₹)</th>
                                        <th scope="col">RMS Service(Yes/No)</th>
                                        <th scope="col">RMS Service Charges(₹)</th>
                                        <th scope="col">Product Listing Price(%)</th>
                                        <th scope="col">GST Charges(%)</th>
                                        <th scope="col">Delivery Charges(₹)</th>
                                        <th scope="col">Channel Partner Commison(%)</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                    <thead>

                                        <tfoot>
                                            <tr>
                                                {{-- <th><input type="checkbox" class="form-check-input" id="exampleCheck1"></th> --}}
                                                <td>ID</td>
                                                <td>Category Name</td>
                                                <td>HSN Code</td>
                                                <td>Service</td>
                                                <td>Service Charges</td>
                                                <td>RMS</td>
                                                <td>RMS Charges</td>
                                                <td>Listing Price</td>
                                                <td>GST</td>
                                                <td>Delivery Charges</td>
                                                <td>Commison</td>
                                            </tr>
                                        </tfoot>

                                    <tbody>
                                    @foreach ($allCategory as $key => $cat)
                                    <tr>
                                        {{-- <td>
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        </td> --}}
                                        <td>{{$cat->id}}</td>
                                        <td>{{$cat->cat_title}}</td>

                                        <td>
                                            @if($cat->hsncode)
                                            {{$cat->hsncode}}
                                            @else
                                            NULL
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                @if($cat->is_service_available == 0)
                                                <p class="mr-2">No</p>
                                                @else
                                                <p class="mr-2">Yes</p>
                                                @endif
                                                <a href="#" class="btnmodal edit mr-5" data-toggle="modal"
                                                    data-target="#serviceInstallation" class="edit mr-5"
                                                    data-id="{{$cat->id}}" data-service="{{$cat->is_service_available}}"
                                                    data-serviceInstallationCharge="{{$cat->service_installation_charges}}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>

                                        @if ($cat->service_installation_charges)
                                        <td>₹{{ $cat->service_installation_charges }}</td>
                                        @else
                                        <td>Null</td>
                                        @endif

                                        <td>
                                            <div class="d-flex">
                                                @if($cat->is_rms_available == 0)
                                                <p class="mr-2">No</p>
                                                @else
                                                <p class="mr-2">Yes</p>
                                                @endif
                                                <a href="#" class="btnmodal edit mr-5" class="edit mr-5"
                                                    data-toggle="modal"
                                                    data-target="#rmsService"
                                                    data-id="{{$cat->id}}"
                                                    data-rms="{{$cat->is_rms_available}}"
                                                    data-rmsCharge="{{$cat->rms_service_charges}}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @if ($cat->rms_service_charges)
                                        <td>₹{{ $cat->rms_service_charges }}</td>
                                        @else
                                        <td>Null</td>
                                        @endif
                                        <td>
                                            <div class="d-flex">
                                                @if ($cat->product_listing_rate)
                                                <p class="mr-2">{{ $cat->product_listing_rate }}%</p>

                                                @else
                                                <p>0%</p>

                                                @endif
                                                <a href="#" class="btnmodal edit mr-5" data-toggle="modal"
                                                    data-target="#productListingRate" class="edit mr-5"
                                                    data-id="{{$cat->id}}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                @if($cat->gst_rate)
                                                <p class="mr-2">{{$cat->gst_rate}}%</p>
                                                @else
                                                <p class="mr-2">No</p>
                                                @endif
                                                <a href="#" class="btnmodal edit mr-5" data-toggle="modal"
                                                    data-target="#exampleModalCenter" class="edit mr-5"
                                                    data-id="{{$cat->id}}" data-commision="{{$cat->commision_rate}}"
                                                    data-service="{{$cat->is_service_available}}"
                                                    data-hsncode="{{$cat->hsncode}}" data-gst="{{$cat->gst_rate}}"
                                                    data-deliveryrate="{{$cat->delivery_rate}}"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                @if($cat->delivery_rate)
                                                <p class="mr-2">{{$cat->delivery_rate}}</p>
                                                @else
                                                <p class="mr-2">No</p>
                                                @endif
                                                <a href="#" class="btnmodal edit mr-5" data-toggle="modal"
                                                    data-target="#exampleModalCenter" class="edit mr-5"
                                                    data-id="{{$cat->id}}" data-commision="{{$cat->commision_rate}}"
                                                    data-service="{{$cat->is_service_available}}"
                                                    data-hsncode="{{$cat->hsncode}}" data-gst="{{$cat->gst_rate}}"
                                                    data-deliveryrate="{{$cat->delivery_rate}}"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        @if($cat->commision_rate)
                                        <td>{{$cat->commision_rate}}%</td>
                                        @else
                                        <td>N.A</td>
                                        @endif
                                        {{-- <td>
                                            <div class="d-flex">
                                                <a href="#" class="btnmodal edit mr-5" data-toggle="modal" data-target="#exampleModalCenter" class="edit mr-5"
                                                    data-id="{{$cat->id}}" data-commision="{{$cat->commision_rate}}"
                                        data-service="{{$cat->is_service_available}}"
                                        data-hsncode="{{$cat->hsncode}}"
                                        data-gst="{{$cat->gst_rate}}"
                                        data-deliveryrate="{{$cat->delivery_rate}}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                            </div>
                            </td> --}}
                            </tr>
                            @endforeach
                            <tbody>
                            </table>
                        </div>

                        <!--Model Start-->
                        <!-- Service Installation -->
                        <div class="modal fade" id="serviceInstallation" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Service &
                                            Installation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('/admin/service-installation')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="catid" id="catid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Service & Installation Available?</label>
                                                        <select class="form-control" name="service_installation"
                                                            id="service_installation">
                                                            <option value="">Please Select </option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Service & Installation Charges(₹)</label>
                                                        <input type="number" name="service_installation_charges"
                                                            id="service_installation_charges" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Service Installation -->

                        <!-- RMS Service -->
                        <div class="modal fade" id="rmsService" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">RMS Service</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('/admin/rms-service')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="catid" id="catid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>RMS Service Available?</label>
                                                        <select class="form-control" name="rms_service"
                                                            id="rms_service">
                                                            <option value="">Please Select </option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>RMS Service Charges(₹)</label>
                                                        <input type="number" name="rms_service_charges"
                                                            id="rms_service_charges" class="form-control" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /RMS Service -->

                        <!-- product listing charges -->
                        <div class="modal fade" id="productListingRate" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Product Listing
                                            Charges(%)</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('/admin/product-listing-rate')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="catid" id="catid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Product Listing Charges</label>
                                                        <input type="number" name="product_listing_rate"
                                                            id="product_listing_rate" class="form-control" min="0"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /product listing charges -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Service Charge
                                            For Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('/admin/managecatservice')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="catid" id="catid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Service Available?</label>
                                                        <select class="form-control" name="service" id="service">
                                                            <option value="">Please Select </option>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Commision Percentage</label>
                                                        <input type="number" name="commison" id="commision"
                                                            class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>HSN Code</label>
                                                        <input type="number" name="hsncode" id="hsncode"
                                                            class="form-control" min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>GST Percentage</label>
                                                        <input type="number" name="gst" id="gst" class="form-control"
                                                            min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Delivery Rate</label>
                                                        <input type="number" name="deliveryrate" id="deliveryrate"
                                                            class="form-control" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                {{-- <div class="pagination-content mt-10">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{$allCategory->links()}}
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.admin_layout.admin_footer')
        <!-- /footer -->
    </div>
    <!-- /content area -->
</div>

<script>
    $('#serviceInstallation').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget);
       var id = button.data('id');
       var service = button.data('service');
       var service_installation_charges = button.data('serviceInstallationCharge');

       var modal = $(this);
       modal.find('.modal-body #catid').val(id);
       modal.find('.modal-body #service').val(service);
       modal.find('.modal-body #service_installation_charges').val(service_installation_charges);
    })

    $('#rmsService').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget);
       var id = button.data('id');
       var rms_service = button.data('rms');
       var rms_service_charges = button.data('rmsCharge');

       console.log(rms_service);
       console.log(rms_service_charges);

       var modal = $(this);
       modal.find('.modal-body #catid').val(id);
       modal.find('.modal-body #rms_service').val(rms_service);
       modal.find('.modal-body #rms_service_charges').val(rms_service_charges);
    })
</script>
<script>
    $('#productListingRate').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget);
       var id = button.data('id');
       var modal = $(this);
       modal.find('.modal-body #catid').val(id);
    })
</script>
<script>
    $('#exampleModalCenter').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget);
       var id = button.data('id');
       var commision = button.data('commision');
       var service = button.data('service');
       var hsncode = button.data('hsncode');
       var gst = button.data('gst');
       var deliveryrate = button.data('deliveryrate');

       var modal = $(this);
       modal.find('.modal-body #catid').val(id);
       modal.find('.modal-body #service').val(service);
       modal.find('.modal-body #commision').val(commision);
       modal.find('.modal-body #hsncode').val(hsncode);
       modal.find('.modal-body #gst').val(gst);
       modal.find('.modal-body #deliveryrate').val(deliveryrate);
    })
</script>
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

<script type="text/javascript">
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#cat_mag_tbl tfoot td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#cat_mag_tbl').DataTable({
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

} );
</script>

@endsection
