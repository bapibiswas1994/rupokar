<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js') }}"></script>
    <script>
        WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
    </script>
    <!--end::Fonts -->
    <link rel="shortcut icon" href="{{ asset('admin-assets/media/logos/favicon.ico') }}" />

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ asset('admin-assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ asset('admin-assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('admin-assets/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/vendors/custom/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('admin-assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('admin-assets/demo/default/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/demo/default/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/demo/default/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/demo/default/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->

</head>
<!-- end::Head -->
<!-- begin::Body -->
<body
    class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Page -->
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="index.html">
                <img alt="Logo" src="{{ asset('admin-assets/media/logos/logo-light.png') }}" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
        </div>
    </div>
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->           
            @include('layouts.admin.sidebar')
            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
                @include('layouts.admin.header')
                <!-- end:: Header -->
                <!-- begin:: Content -->               
                @yield('content')
                <!-- end:: Content -->
                <!-- begin:: Footer -->
                @include('layouts.admin.footer')
                <!-- end:: Footer -->
            </div>
        </div>
    </div>
    <!-- end:: Page -->
    <!-- begin::Quick Panel -->
    <div id="kt_quick_panel" class="kt-quick-panel">
        <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
        <div class="kt-quick-panel__nav">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x"
                role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications"
                        role="tab">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
                </li>
            </ul>
        </div>
        <div class="kt-quick-panel__content">
            <div class="tab-content">
                <div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
                    <div class="kt-notification">
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-line-chart kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New order has been received
                                </div>
                                <div class="kt-notification__item-time">
                                    2 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-box-1 kt-font-brand"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New customer is registered
                                </div>
                                <div class="kt-notification__item-time">
                                    3 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-chart2 kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    Application has been approved
                                </div>
                                <div class="kt-notification__item-time">
                                    3 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-image-file kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New file has been uploaded
                                </div>
                                <div class="kt-notification__item-time">
                                    5 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-bar-chart kt-font-info"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New user feedback received
                                </div>
                                <div class="kt-notification__item-time">
                                    8 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    System reboot has been successfully completed
                                </div>
                                <div class="kt-notification__item-time">
                                    12 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-favourite kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New order has been placed
                                </div>
                                <div class="kt-notification__item-time">
                                    15 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item kt-notification__item--read">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-safe kt-font-primary"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    Company meeting canceled
                                </div>
                                <div class="kt-notification__item-time">
                                    19 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-psd kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New report has been received
                                </div>
                                <div class="kt-notification__item-time">
                                    23 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon-download-1 kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    Finance report has been generated
                                </div>
                                <div class="kt-notification__item-time">
                                    25 hrs ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon-security kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New customer comment recieved
                                </div>
                                <div class="kt-notification__item-time">
                                    2 days ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-pie-chart kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    New customer is registered
                                </div>
                                <div class="kt-notification__item-time">
                                    3 days ago
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
                    <div class="kt-notification-v2">
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon-bell kt-font-brand"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    5 new user generated report
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Reports based on sales
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-box kt-font-danger"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    2 new items submited
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    by Grog John
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon-psd kt-font-brand"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    79 PSD files generated
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Reports based on sales
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-supermarket kt-font-warning"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    $2900 worth producucts sold
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Total 234 items
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon-paper-plane-1 kt-font-success"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    4.5h-avarage response time
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Fostest is Barry
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-information kt-font-danger"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    Database server is down
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    10 mins ago
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-mail-1 kt-font-brand"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    System report has been generated
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Fostest is Barry
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification-v2__item">
                            <div class="kt-notification-v2__item-icon">
                                <i class="flaticon2-hangouts-logo kt-font-warning"></i>
                            </div>
                            <div class="kt-notification-v2__itek-wrapper">
                                <div class="kt-notification-v2__item-title">
                                    4.5h-avarage response time
                                </div>
                                <div class="kt-notification-v2__item-desc">
                                    Fostest is Barry
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings"
                    role="tabpanel">
                    <form class="kt-form">
                        <div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Notifications:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--success kt-switch--sm">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_1">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Case Tracking:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--success kt-switch--sm">
                                    <label>
                                        <input type="checkbox" name="quick_panel_notifications_2">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-last form-group-xs row">
                            <label class="col-8 col-form-label">Support Portal:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--success kt-switch--sm">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_2">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                        <div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Generate Reports:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--danger">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_3">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Report Export:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--danger">
                                    <label>
                                        <input type="checkbox" name="quick_panel_notifications_3">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-last form-group-xs row">
                            <label class="col-8 col-form-label">Allow Data Collection:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--danger">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_4">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                        <div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Enable Member singup:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--brand">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_5">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--brand">
                                    <label>
                                        <input type="checkbox" name="quick_panel_notifications_5">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group form-group-last form-group-xs row">
                            <label class="col-8 col-form-label">Enable Customer Portal:</label>
                            <div class="col-4 kt-align-right">
                                <span class="kt-switch kt-switch--sm kt-switch--brand">
                                    <label>
                                        <input type="checkbox" checked="checked" name="quick_panel_notifications_6">
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end::Quick Panel -->
    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- end::Scrolltop -->
    <!-- begin::Sticky Toolbar -->
    <ul class="kt-sticky-toolbar" style="margin-top: 30px;">
        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle"
            data-toggle="kt-tooltip" title="Check out more demos" data-placement="right">
            <a href="#" class=""><i class="flaticon2-drop"></i></a>
        </li>
        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip"
            title="Layout Builder" data-placement="left">
            <a href="https://keenthemes.com/metronic/preview/default/builder.html" target="_blank"><i
                    class="flaticon2-gear"></i></a>
        </li>
        <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip"
            title="Documentation" data-placement="left">
            <a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i
                    class="flaticon2-telegram-logo"></i></a>
        </li>
    </ul>
    <!-- end::Sticky Toolbar -->
    <!-- begin::Demo Panel -->
    <div id="kt_demo_panel" class="kt-demo-panel">
        <div class="kt-demo-panel__head">
            <h3 class="kt-demo-panel__title">
                Select A Demo

                <!--<small>5</small>-->
            </h3>
            <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
        </div>
        <div class="kt-demo-panel__body">
            <div class="kt-demo-panel__item kt-demo-panel__item--active">
                <div class="kt-demo-panel__item-title">
                    Default
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-_Default.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../default/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 2
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-2.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 3
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-3.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 4
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-4.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 5
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-5.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 6
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-6.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 7
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-7.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 8
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-8.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 9
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-9.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 10
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-10.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 11
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-11.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 12
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-12.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="../demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 13
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-13.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <div class="kt-demo-panel__item ">
                <div class="kt-demo-panel__item-title">
                    Demo 14
                </div>
                <div class="kt-demo-panel__item-preview">
                    <img src="{{ asset('admin-assets/media/demos/Demo-14.jpg') }}" alt="" />
                    <div class="kt-demo-panel__item-preview-overlay">
                        <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                    </div>
                </div>
            </div>
            <a href="" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
                Buy Metronic Now!
            </a>
        </div>
    </div>
    <!-- end::Demo Panel -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
    </script>
    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="{{ asset('admin-assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/wnumb/wNumb.js') }}" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="{{ asset('admin-assets/vendors/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/custom/components/vendors/bootstrap-datepicker/init.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/custom/components/vendors/bootstrap-timepicker/init.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/custom/components/vendors/bootstrap-switch/init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/custom/components/vendors/bootstrap-markdown/init.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/custom/components/vendors/bootstrap-notify/init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/custom/components/vendors/jquery-validation/init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/raphael/raphael.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/morris.js/morris.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/custom/components/vendors/sweetalert2/init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('admin-assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Vendors(used by this page) -->
    <script src="{{ asset('admin-assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript">
    </script>
    <script src="{{ asset('admin-assets/vendors/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('admin-assets/app/custom/general/dashboard.js') }}" type="text/javascript"></script>

    <!--end::Page Scripts -->

    <!--begin::Global App Bundle(used by all pages) -->
    <script src="{{ asset('admin-assets/app/bundle/app.bundle.js') }}" type="text/javascript"></script>

    <!--end::Global App Bundle -->
</body>

<!-- end::Body -->

</html>