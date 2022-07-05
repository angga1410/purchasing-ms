<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>Procurement | GSPE</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
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

    <!--end::Web font -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ URL::asset('/admin/vendors') }}/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <!--end:: Global Mandatory Vendors -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--begin:: Global Optional Vendors -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
    <link href="{{ URL::asset('/admin/vendors') }}/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/admin/vendors') }}/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />



    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->
    <link href="{{ URL::asset('/admin/assets') }}/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />


    <!--RTL version:<link href="{{ URL::asset('/admin/assets') }}/demo/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    <link href="{{ URL::asset('/admin/assets') }}/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />


    <!--RTL version:<link href="{{ URL::asset('/admin/assets') }}/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon" href="{{ URL::asset('/admin/assets') }}/demo/media/img/logo/favicon.ico" />
    <script type="text/javascript" src='{{ asset("/js/jquery.js") }}'></script>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<style>
    /* Adjusting the shadow of the modal content - also removing border radius */
    .modal-content {
        box-shadow: 0 0 5px rgba(0, 0, 0, .5);
        border-radius: 0;
    }

    /* Removing the border radius on btns just in modal */
    .modal-content .btn {
        border-radius: 0;
    }

    /* Adjusting  the close button */
    .close {
        font-size: 30px;
        font-weight: 300;
    }

    .modal-header .close {
        margin-top: -10px;
    }

    .custom-logo {
        top: 0;
        left: 0;
        z-index: 100;
        background: green;
        height: 80px;
        width: 275px;
    }
</style>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">
    <!-- This is the modal content -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->

                <h2 class="modal-title center"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp&nbsp New Request Items </h2>
                </br>
                *mohon segera di Approve
                <div class="modal-header">

                </div>
                <!--  Body -->
                <form action="{{ route('save_item_notif') }}" method="post" enctype="multipart/form-data" onsubmit="ok()">
                    <div class="modal-body">
                        <div class="form-group">
                            {!! csrf_field() !!}
                            <table class="table table-bordered" id="tablereq">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>MFR</th>
                                        <th>Part Number</th>
                                        <th>Part Name</th>
                                        <th>Part Description</th>
                                        <th>Default UM</th>
                                        <th>Request By</th>


                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Approve</button>

                    </div>
                </form><!-- Footer End -->
            </div> <!-- Content end -->
        </div> <!-- Dialog end -->
    </div> <!-- Modal end -->

    <!-- This is the modal content -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header -->

                <h2 class="modal-title center"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp&nbsp New Request Items </h2>
                </br>
                *mohon segera di Approve
                <div class="modal-header">

                </div>
                <!--  Body -->
                <form action="{{ route('save_item_notif') }}" method="post" enctype="multipart/form-data" onsubmit="ok2()">
                    <div class="modal-body">
                        <div class="form-group">
                            {!! csrf_field() !!}
                            <table class="table table-bordered" id="tablereq1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>MFR</th>
                                        <th>Part Number</th>
                                        <th>Part Name</th>
                                        <th>Part Description</th>
                                        <th>Default UM</th>
                                        <th>Request By</th>


                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Approve</button>


                    </div>
                </form><!-- Footer End -->
                <button class="btn btn-success" onclick="closing()">Close</button>
            </div> <!-- Content end -->
        </div> <!-- Dialog end -->
    </div> <!-- Modal end -->
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page ">
        <!-- <div class="custom-logo">
            <div class="">
                <a href="">
                    <img alt="" src="{{ URL::asset('/admin/assets') }}/demo/media/img/logo/gspe.png" />
                </a>

                <span><input type="radio"> </span>
            </div>
        </div> -->

        <!-- BEGIN: Header -->
        <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop">

                    <!-- BEGIN: Brand -->
                    <div  class="m-stack__item m-brand  ">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo ">
                                <a href="" class="m-brand__logo-wrapper">
                                    <img alt="" src="{{ URL::asset('/admin/assets') }}/demo/media/img/logo/gspe.png" />
                                </a>

                                <h3 class="m-header__title ">GSPE | Procurement</h3>
                            </div>
                            <div>

                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">

                                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>

                                <!-- END -->

                                <!-- BEGIN: Responsive Header Menu Toggler -->
                                <!-- <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a> -->

                                <!-- END -->

                                <!-- BEGIN: Topbar Toggler -->
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="flaticon-more"></i>
                                </a>

                                <!-- BEGIN: Topbar Toggler -->
                            </div>
                        </div>
                    </div>

                    <!-- END: Brand -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <!-- <div class="m-header__title">
                            <h3 class="m-header__title-text"></h3>
                        </div> -->

                        <!-- BEGIN: Topbar -->
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-light" id="m_quicksearch" m-quicksearch-mode="default">

                                <!--BEGIN: Search Form -->
                                <form class="m-header-search__form">
                                    <div class="m-header-search__wrapper">
                                        <span class="m-header-search__icon-search" id="m_quicksearch_search">
                                            <i class="flaticon-search"></i>
                                        </span>
                                        <span class="m-header-search__input-wrapper">
                                            <input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
                                        </span>
                                        <span class="m-header-search__icon-close" id="m_quicksearch_close">
                                            <i class="la la-remove"></i>
                                        </span>
                                        <span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
                                            <i class="la la-remove"></i>
                                        </span>
                                    </div>
                                </form>

                                <!--END: Search Form -->

                                <!--BEGIN: Search Results -->
                                <div class="m-dropdown__wrapper">
                                    <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-height="300" data-mobile-height="200">
                                                <div class="m-dropdown__content m-list-search m-list-search--skin-light">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--BEGIN: END Results -->
                            </div>

                            <div class="m-stack__item m-topbar__nav-wrapper">

                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                    <li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon" onclick="closenotif()">
                                            <span class="m-nav__link-badge m-badge  m-badge--danger" id="newnotif">New</span>
                                            <span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i class="flaticon-alarm"></i></span></span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <span class="m-dropdown__header-title">Notification</span>
                                                    <span class="m-dropdown__header-subtitle">User Notifications</span>
                                                </div>
                                                <!-- <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                                    Request Items
                                                                </a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">Events</a>
                                                            </li>
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">Logs</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                                <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                                                        <div class="m-list-timeline__items" id="notif">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                                <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                                                        <div class="m-list-timeline__items">
                                                                            <div class="m-list-timeline__item">
                                                                                <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                <a href="" class="m-list-timeline__text">New order received</a>
                                                                                <span class="m-list-timeline__time">Just now</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                                                <a href="" class="m-list-timeline__text">New invoice received</a>
                                                                                <span class="m-list-timeline__time">20 mins</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                                <a href="" class="m-list-timeline__text">Production server up</a>
                                                                                <span class="m-list-timeline__time">5 hrs</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href="" class="m-list-timeline__text">New order received</a>
                                                                                <span class="m-list-timeline__time">7 hrs</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href="" class="m-list-timeline__text">System shutdown</a>
                                                                                <span class="m-list-timeline__time">11 mins</span>
                                                                            </div>
                                                                            <div class="m-list-timeline__item">
                                                                                <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                                <a href="" class="m-list-timeline__text">Production server down</a>
                                                                                <span class="m-list-timeline__time">3 hrs</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                                <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                                                    <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                                                        <span class="">All caught up!<br>No new logs.</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                            <span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i class="flaticon-share"></i></span></span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <span class="m-dropdown__header-title">Quick Actions</span>
                                                    <span class="m-dropdown__header-subtitle">Shortcuts</span>
                                                </div>
                                                <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                    <div class="m-dropdown__content">
                                                        <div class="m-scrollable" data-scrollable="false" data-height="380" data-mobile-height="200">
                                                            <div class="m-nav-grid m-nav-grid--skin-light">
                                                                <div class="m-nav-grid__row">
                                                                    <a href="#" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-file"></i>
                                                                        <span class="m-nav-grid__text">Generate Report</span>
                                                                    </a>
                                                                    <a href="#" class="m-nav-grid__item" onclick="ok()">
                                                                        <i class="m-nav-grid__icon flaticon-time"></i>
                                                                        <span class="m-nav-grid__text">Add New Event</span>
                                                                    </a>
                                                                </div>
                                                                <div class="m-nav-grid__row">
                                                                    <a href="#" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                        <span class="m-nav-grid__text">Create New Task</span>
                                                                    </a>
                                                                    <a href="#" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                        <span class="m-nav-grid__text">Completed Tasks</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li> -->
                                    <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-topbar__userpic m--hide">
                                                <img src="{{ URL::asset('/admin/assets') }}/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt="" />
                                            </span>
                                            <span class="m-nav__link-icon m-topbar__usericon">
                                                <span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
                                            </span>
                                            <span class="m-topbar__username m--hide">Nick</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <div class="m-card-user m-card-user--skin-light">
                                                        <div class="m-card-user__pic">
                                                            <!-- <img src="{{ URL::asset('/admin/assets') }}/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt="" /> -->
                                                        </div>
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
                                                            <a href="" class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
                                                                <span class="m-nav__section-text">Section</span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">My Profile</span>
                                                                            <!-- <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span> -->
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <!-- <li class="m-nav__item">
                                                                <a href="profile.html" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                    <span class="m-nav__link-text">Activity</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="profile.html" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="profile.html" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="profile.html" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li> -->
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('logout1') }}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-nav__link-icon m-nav__link-icon-alt"><span class="m-nav__link-icon-wrapper"><i class="flaticon-grid-menu"></i></span></span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>

                        <!-- END: Topbar -->
                    </div>
                </div>
            </div>
        </header>

        <!-- END: Header -->

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- <div class="custom-logo">

            </div> -->
            <!-- <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop  "> -->


            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
            <div id="m_aside_left" class=" m-grid__item  m-aside-left ">
                <!-- <button class=" " id="m_aside_left_minimize_toggle"><i class="la la-close"></i></button> -->

                <!-- BEGIN: Aside Menu -->
                <div id="m_ver_menu" class=" m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light  " data-menu-vertical="true" m-menu-scrollable="1" m-menu-dropdown-timeout="500">

                    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ route('home') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-chart-line"></i><span class="m-menu__link-text">Dashboard</span></a>

                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-user"></i><span class="m-menu__link-text">Supplier</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_supplier') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Supplier</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('supplier_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Supplier List</span></a></li>
                                    <!-- <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('task_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Task List</span></a></li> -->
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('supplier_approve') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Approve</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('delete_approve') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Approve Delete</span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-text">Supplier Contact</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_supplier_contact') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Contact</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('supplier_contact_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Contact List</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-dollar-sign"></i><span class="m-menu__link-text">RFI</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_inquiry') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Inquiry By PR</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_inquiry_item') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Inquiry By Item</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('list_inquiry') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">RFI List </span></a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-envelope"></i><span class="m-menu__link-text">RFQ</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_rfq') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create RFQ</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('rfq_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">RFQ List</span></a></li>
                                </ul>
                            </div>
                        </li> -->

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-comments"></i><span class="m-menu__link-text">Quotation</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_quotation') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add Quotation</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('quotation_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Quotation List</span></a></li>
                                    <!-- <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('quotation_approve') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Quotation Approve</span></a></li> -->
                                </ul>
                            </div>
                        </li>


                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-shopping-cart"></i><span class="m-menu__link-text">Items</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('items_list_request') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Items Request</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_item') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Item</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('items_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Items List</span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-dollar-sign"></i><span class="m-menu__link-text">Item Price</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_price') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Price</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('price_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Price List</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- 
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-edit"></i><span class="m-menu__link-text">Items Quote</span><i
                                     class="m-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_item_quote') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Item Quote</span></a></li>
                                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('item_quote_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Item Quote List</span></a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-dollar-sign"></i><span class="m-menu__link-text">Price Quote</span><i
                                     class="m-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_price_quote') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Price Quote</span></a></li>
                                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('price_quote_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Price Quote List</span></a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-database"></i><span class="m-menu__link-text">Items Buffer</span><i
                                     class="m-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_item_buffer') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Item Buffer</span></a></li>
                                        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('item_buffer_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Item Buffer List</span></a></li>
                                    </ul>
                                </div>
                            </li> -->



                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-tag"></i><span class="m-menu__link-text">Purchase Request</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_purchase_request_direct') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Purchase Request Direct</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_purchase_request') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Purchase Request from Quotation</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('purchase_request_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Request List</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('purchase_request_approve') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Request Approve</span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-tag"></i><span class="m-menu__link-text">Purchase Order</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('create_purchase_order') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Create Purchase Order</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('purchase_order_list') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Order List</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('purchase_order_verify') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Order Verify</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('purchase_order_approve') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Order Approve</span></a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-upload"></i><span class="m-menu__link-text">Import</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="/import/import-po" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Import Purchase Order</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="/import/import-items" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Import Items</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="/import/import-pr" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Import Purchase Request</span></a></li>

                                </ul>

                            </div>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-flag"></i><span class="m-menu__link-text">Report</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('report') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Order</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('purchase_price') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Price</span></a></li>
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('query_report') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Query</span></a></li>
                                   
                                    <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1"><a href="{{ route('tracking') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Purchase Request Tracking</span></a></li>
                                </ul>

                            </div>
                        </li>

                    </ul>
                </div>

                <!-- END: Aside Menu -->
            </div>

            <!-- END: Left Aside -->

            @yield('content')
            <!-- </div> -->
        </div>

        <!-- end:: Body -->

        <!-- begin::Footer -->
        <!-- <footer class="m-grid__item     m-footer ">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">

                        </span>      
                    </div>
                    <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                        <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">About</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">Privacy</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">T&C</span>
                                </a>
                            </li>

                            <li class="m-nav__item m-nav__item">
                                <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                                    <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> -->

        <!-- end::Footer -->
    </div>

    <!-- end:: Page -->



    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

    <!-- end::Scroll Top -->

    <!-- begin::Quick Nav -->
    <ul class="m-nav-sticky" style="margin-top: 30px;">
        <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank"><i class="la la-cart-arrow-down"></i></a>
        </li>
        <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
            <a href="https://keenthemes.com/metronic/documentation.html" target="_blank"><i class="la la-code-fork"></i></a>
        </li>
        <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
            <a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank"><i class="la la-life-ring"></i></a>
        </li>
    </ul>

    <!-- begin::Quick Nav -->

    <!--begin:: Global Mandatory Vendors -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->

    <!--<script src="{{ URL::asset('/admin/vendors') }}/jquery/dist/jquery.js" type="text/javascript"></script>-->
    <script src="{{ URL::asset('/admin/vendors') }}/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/wnumb/wNumb.js" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' type="text/css" />
    <link rel="stylesheet" href='{{ asset("/css/buttons.dataTables.min.css") }}' type="text/css" />
    <script type="text/javascript" src='{{ asset("/js/dataTables.buttons.min.js") }}'></script>
    <script type="text/javascript" src='{{ asset("/js/buttons.flash.min.js") }}'></script>
    <script type="text/javascript" src='{{ asset("/js/jszip.min.js") }}'></script>
    <script type="text/javascript" src='{{ asset("/js/pdfmake.min.js") }}'></script>
    <script type="text/javascript" src='{{ asset("/js/vfs_fonts.js") }}'></script>
    <script type="text/javascript" src='{{ asset("/js/buttons.html5.min.js") }}'></script>
    <script type="text/javascript" src='{{ asset("/js/buttons.print.min.js") }}'></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
    <!--begin:: Global Optional Vendors -->
    <script src="{{ URL::asset('/admin/vendors') }}/jquery.repeater/src/lib.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/jquery.repeater/src/repeater.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/block-ui/jquery.blockUI.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/forms/bootstrap-timepicker.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/forms/bootstrap-switch.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/select2/dist/js/select2.full.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/handlebars/dist/handlebars.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/inputmask/dist/inputmask/inputmask.phone.extensions.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/nouislider/distribute/nouislider.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/autosize/dist/autosize.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/dropzone/dist/dropzone.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/summernote/dist/summernote.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/markdown/lib/markdown.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/forms/bootstrap-markdown.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/forms/jquery-validation.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/base/bootstrap-notify.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/toastr/build/toastr.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/jstree/dist/jstree.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/raphael/raphael.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/morris.js/morris.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/chartist/dist/chartist.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/counterup/jquery.counterup.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin/vendors') }}/js/framework/components/plugins/base/sweetalert2.init.js" type="text/javascript"></script>


    <!-- <link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />

    <script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
    <script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

    <script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script> -->
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle -->
    <script src="{{ URL::asset('/admin/assets') }}/demo/base/scripts.bundle.js" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Vendors -->
    <script src="{{ URL::asset('/admin/assets') }}/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts -->
    <script src="{{ URL::asset('/admin/assets') }}/app/js/dashboard.js" type="text/javascript"></script>
    <script src="{{ URL::asset('/admin') }}/js/default.js" type="text/javascript"></script>

    <!--end::Page Scripts -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sockjs-client@1/dist/sockjs.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/webstomp-client@1.2.6/dist/webstomp.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script type="text/javascript">
        $("#newnotif").hide();
        var sock = new SockJS('http://192.168.0.85:5050/ws');
        console.log('run sock');
        var connect = webstomp.over(sock);
        var number = 0;
        var nama = 0;
        var message = 0;
        var message2 = 0;
        toastr.options = {

            "showDuration": "3000",
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
        }
        connect.connect({},
            () => {
                connect.subscribe('/topic/notification/purchase', msg => {
                    console.log(JSON.parse(msg.body))
                    var nama = "crm-" + JSON.parse(msg.body).poId;
                    console.log(nama);
                    var id = JSON.parse(msg.body).userId;
                    message = {
                        title: JSON.parse(msg.body).title,
                        userId: JSON.parse(msg.body).userId,
                        poId: JSON.parse(msg.body).poId,
                    }

                    number = id;
                    $("#newnotif").show();
                    $("#notif").prepend('  <div class="m-list-timeline__item"><span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span><span class="m-list-timeline__text">' + JSON.parse(msg.body).title + ' ' + JSON.parse(msg.body).createdAt + ' &nbsp <span class="m-nav__link-badge m-badge  m-badge--danger" id="newnotif" >New</span></span><span class="m-list-timeline__time"><button class="btn-primary" onclick="view(' + JSON.parse(msg.body).poId + ',' + JSON.parse(msg.body).id + ',' + JSON.parse(msg.body).userId + ')">View</button></span></div>');
                    // $(function() {
                    //     $('#tablereq').DataTable({
                    //         processing: true,
                    //         serverSide: true,
                    //         ajax: "{{ route('item_data_req') }}/" + nama,
                    //         columns: [{
                    //                 data: 'items',
                    //                 name: 'items'
                    //             },
                    //             {
                    //                 data: 'mfr',
                    //                 name: 'mfr'
                    //             },
                    //             {
                    //                 data: 'part_num',
                    //                 name: 'part_num'
                    //             },
                    //             {
                    //                 data: 'part_name',
                    //                 name: 'part_name'
                    //             },
                    //             {
                    //                 data: 'part_desc',
                    //                 name: 'part_desc'
                    //             },
                    //             {
                    //                 data: 'default_um',
                    //                 name: 'default_um'
                    //             },
                    //             {
                    //                 data: 'request_by',
                    //                 name: 'request_by'
                    //             },


                    //         ]
                    //     });

                    // });
                    toastr.info(JSON.parse(msg.body).title);

                    // $('#myModal').modal({
                    //     backdrop: 'static',
                    //     keyboard: false
                    // })
                    // toastr.info('Request new Items from '+JSON.parse(msg.body).name+'<br /><br /><button  class="btn btn-success" type="button" onclick="sent()" class="btn clear">Approve</button>');
                })


            },

        );

        // setTimeout(()=>{
        //    console.log(number);
        // },5000);
        function closenotif() {
            $("#newnotif").hide();
        }
        $.ajax({
            type: "get",
            url: "http://192.168.0.85:5050/api/purchase/notification",
            success: function(data) {
                $.each(data, function(index, datum) {
                    console.log(datum.userId);
                    $("#notif").append('  <div class="m-list-timeline__item"><span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span><span class="m-list-timeline__text">' + datum.title + ' ' + datum.createdAt + '</span><span class="m-list-timeline__time"><button class="btn-primary" onclick="view(' + datum.poId + ',' + datum.id + ',' + datum.userId + ')">View</button></span></div>');

                });
            },

        });


        function ok() {

            var test = JSON.stringify(message);

            connect.send('/ws/notification/crm/' + number, test);



        }

        // console.log(sock);



        function view(poId, notifId, userId) {
            console.log(poId);
            number = userId;
            var id = "crm-" + poId
            message2 = {
                title: "Product Request Approved",
                userId: userId,
                poId: poId,
            };
            console.log(id);
            $(function() {
                $('#tablereq1').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('item_data_req') }}/" + id,

                    columns: [{
                            data: 'items',
                            name: 'items'
                        },
                        {
                            data: 'mfr',
                            name: 'mfr'
                        },
                        {
                            data: 'part_num',
                            name: 'part_num'
                        },
                        {
                            data: 'part_name',
                            name: 'part_name'
                        },
                        {
                            data: 'part_desc',
                            name: 'part_desc'
                        },
                        {
                            data: 'default_um',
                            name: 'default_um'
                        },
                        {
                            data: 'request_by',
                            name: 'request_by'
                        },
                    ],
                    language: {
                        emptyTable: "Product has been approve"
                    }
                });




                //             $.ajax({
                //   type: "PUT",
                //   url: "http://192.168.0.85:5050/api/purchase/notification",
                //   data: change,
                //   headers: {
                //       "Content-Type" : "application/json",
                //   },
                //   success: success,
                //   dataType: dataType
                // });

            });
            $('#myModal1').modal({
                backdrop: 'static',
                keyboard: false
            })
        }

        function closing() {
            $('#myModal1').modal('hide');
            location.reload();
        }

        function ok2() {

            var test = JSON.stringify(message2);
            console.log(test);

            connect.send('/ws/notification/crm/' + number, test);


        }

        // function getquery (query) {
        //     var el;

        //     if (query === document) {
        //         return document;
        //     }

        //     if (!!(query && query.nodeType === 1)) {
        //         return query;
        //     }

        //     if (el = document.getElementById(query)) {
        //         return el;
        //     } else if (el = document.getElementsByTagName(query)) {
        //         return el[0];
        //     } else if (el = document.getElementsByClassName(query)) {
        //         return el[0];
        //     } else {
        //         return null;
        //     }
        // }
        // function hasclassname(el, className) {
        //     if (!el) {
        //         return;
        //     }

        //     return el.classList ? el.classList.contains(className) : new RegExp('\\b' + className + '\\b').test(el.className);
        // }
        // var bodyq = getquery("body");
        // let custsidebar = document.querySelector(".flaticon-share");
        // // console.log(custsidebar);
        // custsidebar.addEventListener("click", () => {

        // if(btnSidebar.hasclassname(bodyq))



        // });
    </script>
</body>

<!-- end::Body -->

</html>