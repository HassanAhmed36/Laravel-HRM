@extends('Layout.master')
@section('main_section')
    <!-- start page title -->
    <div class="row">
        <div class="col-12 mb-2">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-sm-0 fw-semibold font-size-18">Dashboard</h3>
                @if ($attendance)
                    @if ($attendance->check_in == null && $attendance->check_out == null)
                        <a class="btn btn-primary" href="{{ route('check.in') }}">Check In</a>
                    @elseif ($attendance->check_in != null && $attendance->check_out == null)
                        <a class="btn btn-primary" href="{{ route('check.out') }}">Check Out</a>
                    @endif
                @endif
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>Skote Dashboard</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="assets/images/users/avatar-1.jpg" alt=""
                                    class="img-thumbnail rounded-circle">
                            </div>
                            <h5 class="font-size-15 text-truncate">Henry Price</h5>
                            <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-size-15">125</h5>
                                        <p class="text-muted mb-0">Projects</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="font-size-15">$1245</h5>
                                        <p class="text-muted mb-0">Revenue</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="javascript: void(0);"
                                        class="btn btn-primary waves-effect waves-light btn-sm">View
                                        Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Orders</p>
                                    <h4 class="mb-2">1,235</h4>
                                </div>
                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Revenue</p>
                                    <h4 class="mb-2">$35, 723</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Average Price</p>
                                    <h4 class="mb-2">$16.2</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Orders</p>
                                    <h4 class="mb-2">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Revenue</p>
                                    <h4 class="mb-2">$35, 723</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Average Price</p>
                                    <h4 class="mb-2">$16.2</h4>
                                </div>
                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Notice Board</h4>
                <hr>
                <br>
                <div data-simplebar="init" style="min-height: 90px; max-height:340px" class="simplebar-scrollable-y">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <div class="vstack d-flex align-items-start ">
                                            <div class="d-flex mb-3">
                                                <span class="badge badge-pill badge-soft-warning fs-3 fw-semibold d-flex justify-content-center align-items-center rounded-3">
                                                    <p class="pt-3">9 Dec</p>
                                                </span>
                                                <div class="ms-2 flex-grow-1">
                                                    <h6 class="mb-1 font-size-15 mt-1"><a href="job-details.html"
                                                            class="text-body">Marketing Director</a></h6>
                                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur.</b>view more</p>
                                                </div>
                                              
                                            </div>
                                            <div class="d-flex mb-3">
                                                <span class="badge badge-pill badge-soft-warning fs-3 fw-semibold d-flex justify-content-center align-items-center rounded-3">
                                                    <p class="pt-3">9 Dec</p>
                                                </span>
                                                <div class="ms-2 flex-grow-1">
                                                    <h6 class="mb-1 font-size-15 mt-1"><a href="job-details.html"
                                                            class="text-body">Marketing Director</a></h6>
                                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur.</b>view more</p>
                                                </div>
                                              
                                            </div>
                                            <div class="d-flex mb-3">
                                                <span class="badge badge-pill badge-soft-warning fs-3 fw-semibold d-flex justify-content-center align-items-center rounded-3">
                                                    <p class="pt-3">9 Dec</p>
                                                </span>
                                                <div class="ms-2 flex-grow-1">
                                                    <h6 class="mb-1 font-size-15 mt-1"><a href="job-details.html"
                                                            class="text-body">Marketing Director</a></h6>
                                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur.</b>view more</p>
                                                </div>
                                              
                                            </div>
                                            <div class="d-flex mb-3">
                                                <span class="badge badge-pill badge-soft-warning fs-3 fw-semibold d-flex justify-content-center align-items-center rounded-3">
                                                    <p class="pt-3">9 Dec</p>
                                                </span>
                                                <div class="ms-2 flex-grow-1">
                                                    <h6 class="mb-1 font-size-15 mt-1"><a href="job-details.html"
                                                            class="text-body">Marketing Director</a></h6>
                                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur.</b>view more</p>
                                                </div>
                                              
                                            </div>
                                            <div class="d-flex mb-3">
                                                <span class="badge badge-pill badge-soft-warning fs-3 fw-semibold d-flex justify-content-center align-items-center rounded-3">
                                                    <p class="pt-3">9 Dec</p>
                                                </span>
                                                <div class="ms-2 flex-grow-1">
                                                    <h6 class="mb-1 font-size-15 mt-1"><a href="job-details.html"
                                                            class="text-body">Marketing Director</a></h6>
                                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur.</b>view more</p>
                                                </div>
                                              
                                            </div>
                                            <div class="d-flex mb-3">
                                                <span class="badge badge-pill badge-soft-warning fs-3 fw-semibold d-flex justify-content-center align-items-center rounded-3">
                                                    <p class="pt-3">9 Dec</p>
                                                </span>
                                                <div class="ms-2 flex-grow-1">
                                                    <h6 class="mb-1 font-size-15 mt-1"><a href="job-details.html"
                                                            class="text-body">Marketing Director</a></h6>
                                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet consectetur.</b>view more</p>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 372px; height: 520px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 271px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </div>
            </div>
        </div><!--end card-->
    </div>
@endsection
