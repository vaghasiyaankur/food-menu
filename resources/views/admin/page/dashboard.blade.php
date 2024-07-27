@extends('admin.layout.master')

@section('title', 'Dashboard')

{{-- @section('css') @endsection --}}

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <!-- Restaurant Pending Request Table -->
            <div class="col-lg-8 mb-4 order-1 order-lg-0">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-12 d-flex justify-content-between align-items-center pe-4">
                            <h5 class="card-header m-0 me-2 pb-3">Restaurant Pending Request</h5>
                            <a href="#" class="btn btn-primary btn-sm">View All</a>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="pending_request_table">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Sr No</th>
                                                <th>Logo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Code</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Counter -->
            <div class="col-lg-4 col-md-12 order-lg-1">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="menu-icon tf-icons bx bx-user"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Approved</span>
                                <h3 class="card-title mb-2 approved_count"></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="menu-icon tf-icons bx bx-user"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Declined</span>
                                <h3 class="card-title mb-2 declined_count"></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="menu-icon tf-icons bx bx-user"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Pending</span>
                                <h3 class="card-title text-nowrap mb-2 pending_count"></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="menu-icon tf-icons bx bx-user"></i>
                                    </div>
                                    
                                </div>
                                <span class="fw-semibold d-block mb-1">Users</span>
                                <h3 class="card-title mb-2 users"></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Restaurant Approved Table -->
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-12 d-flex justify-content-between align-items-center pe-4">
                            <h5 class="card-header m-0 me-2 pb-3">Restaurant Approved Detail</h5>
                            <a href="#" class="btn btn-primary btn-sm">View All</a>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="approved_table">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Sr No</th>
                                                <th>Logo</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Code</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Restaurant Declined Table -->
        <div class="row">
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-lg-12 d-flex justify-content-between align-items-center pe-4">
                            <h5 class="card-header m-0 me-2 pb-3">Restaurant Declined Detail</h5>
                            <a href="#" class="btn btn-primary btn-sm">View All</a>
                        </div>
                        <div class="col-lg-12">
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table" id="declined_table">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th>Sr No</th>
                                                <th>Logo</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Code</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection


@section('script')
    @includeIf('admin.page.include.script.dashboard_script_js')
@endsection
