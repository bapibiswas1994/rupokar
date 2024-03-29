@extends('layouts.admin.layout')
@section('style')
{{-- --}}
@endsection
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ route('admin.admin-dashboard') }}" class="kt-subheader__breadcrumbs-home"><i
                        class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ route('admin.admin-dashboard') }}" class="kt-subheader__breadcrumbs-link">Dashboard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="javascript::void(0);" class="kt-subheader__breadcrumbs-link">CMS</a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="javascript::void(0);"
                    class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Privacy Policy</a>
            </div>
        </div>
        {{-- <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="{{ route('admin.category.create') }}" class="btn kt-subheader__btn-daterange" id=""
                    data-toggle="kt-tooltip" title="Click to add new category" data-placement="left"><i
                        class="fa fa-plus-square" aria-hidden="true"></i>Add New Category</a>
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions"
                    data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1"
                            class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                    id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                    id="Combined-Shape" fill="#000000" />
                            </g>
                        </svg>

                        <!--<i class="flaticon2-plus"></i>-->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">
                            <li class="kt-nav__section kt-nav__section--first">
                                <span class="kt-nav__section-text">Add new:</span>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                    <span class="kt-nav__link-text">Order</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                    <span class="kt-nav__link-text">Event</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                    <span class="kt-nav__link-text">Report</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                    <span class="kt-nav__link-text">Post</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                    <span class="kt-nav__link-text">File</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- end:: Subheader -->
    <!-- begin:: Content -->
	{{-- <livewire:admin.c-m-s.privacy-policy /> --}}
    <!-- end:: Content -->
</div>
@endsection
@section('scripts')
@endsection