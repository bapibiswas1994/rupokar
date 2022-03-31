<div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Category List</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin::Section-->
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Category Title</th>
                                            <th>Image</th>
                                            <th>Short Description</th>
                                            <th>Long Description</th>
                                            <th>Meta Key</th>
                                            <th>Meta Description</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                        <tr>
                                            <td>{{$category->title}}</td>
                                            <td><img src="{{asset('/admin-assets/Uploads/categoryimages/'.$category->image)}}"
                                                    class="rounded" height="30px;" width="30px"></td>
                                            <td>{{$category->short_desc}}</td>
                                            <td>{{$category->long_desc}}</td>
                                            <td>{{$category->meta_key}}</td>
                                            <td>{{$category->meta_desc}}</td>
                                            <td><span class="label label-success">Active</span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{url('/admin/editcategory/'.$category->id)}}"
                                                        class="edit mr-5"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{url('/admin/deletecategory/'.$category->id)}}"
                                                        onclick="return confirm('Are you sure?')" class="deleter"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        {{--2nd level--}}
                                        @if (count($category->chields) > 0)
                                        @foreach ($category->chields as $key=>$children)
                                        <tr>
                                            <td> --> {{$children->title}}</td>
                                            <td><img src="{{asset('/admin-assets/Uploads/categoryimages/'.$children->image)}}"
                                                    class="rounded" height="30px;" width="30px"></td>
                                            <td>{{$children->short_desc}}</td>
                                            <td>{{$children->long_desc}}</td>
                                            <td>{{$children->meta_key}}</td>
                                            <td>{{$children->meta_desc}}</td>
                                            <td><span class="label label-success">Active</span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{url('/admin/editcategory/'.$children->id)}}"
                                                        class="edit mr-5"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{url('/admin/deletecategory/'.$children->id)}}"
                                                        onclick="return confirm('Are you sure?')" class="deleter "><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        {{--3rd level--}}
                                        @if (count($children->chields) > 0)
                                        @foreach ($children->chields as $key=>$child2)
                                        <tr>
                                            <td> --> --> {{$child2->title}}</td>
                                            <td><img src="{{asset('/admin-assets/Uploads/categoryimages/'.$child2->image)}}"
                                                    class="rounded" height="30px;" width="30px"></td>
                                            <td>{{$child2->short_desc}}</td>
                                            <td>{{$child2->long_desc}}</td>
                                            <td>{{$child2->meta_key}}</td>
                                            <td>{{$child2->meta_desc}}</td>
                                            <td><span class="label label-success">Active</span></td>
                                            {{-- <td>{{$child2->created_at}}</td> --}}
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{url('/admin/editcategory/'.$child2->id)}}"
                                                        class="edit mr-5"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{url('/admin/deletecategory/'.$child2->id)}}"
                                                        onclick="return confirm('Are you sure to delete?')"
                                                        class="deleter "><i class="fa fa-trash-o"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        @endforeach
                                        @endif
                                        @empty
                                        <tr>
                                            <td colspan="10" style="text-align: center;">No records available</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>