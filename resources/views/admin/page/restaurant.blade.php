@extends('admin.layout.master')

@section('title', 'Restaurants')

@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}">
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-datatable table-responsive">
            @includeIf('admin.page.include.header', ['title' => 'Restaurants', 'button' => false, 'back' => false])
            <div class="table-responsive text-nowrap">
                <table
                    class="table table-bordered table-responsive data-table datatables-basic border-top dataTable dtr-column">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Open Time</th>
                            <th>Close Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
    <form class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="backDropModalTitle">Restaurant Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-4 d-flex">
                <div class="col-3">Name</div>
                <div class="col-1 text-center">:</div>
                <div id="name" class="col-8"></div>
            </div>
            <div class="mb-4 d-flex">
                <div class="col-3">Location</div>
                <div class="col-1 text-center">:</div>
                <div id="address" class="col-8"></div>
            </div>
            <div class="mb-4 d-flex">
                <div class="col-3">Email</div>
                <div class="col-1 text-center">:</div>
                <div id="email" class="col-8"></div>
            </div>
            <div class="mb-4 d-flex">
                <div class="col-3">Restaurant Code</div>
                <div class="col-1 text-center">:</div>
                <div id="code" class="col-8"></div>
            </div>
            <div class="mb-4 d-flex">
                <div class="col-3">Start Hours</div>
                <div class="col-1 text-center">:</div>
                <div id="start_hour" class="col-8"></div>
            </div>
            <div class="mb-4 d-flex">
                <div class="col-3">End Hours</div>
                <div class="col-1 text-center">:</div>
                <div id="end_hour" class="col-8"></div>
            </div>
            <div class="mb-4 d-flex">
                <div class="col-3">Restaurant Status</div>
                <div class="col-1 text-center">:</div>
                <div id="status" class="col-8"></div>
            </div>
            <div class="mb-4 d-flex">
                <div class="col-3">Logo</div>
                <div class="col-1 text-center">:</div>
                <div class="col-8">
                    <img id="logo" height="80px" width="80px" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close </button>
        </div>
    </form>
    </div>
</div>

@endsection

@section('script')
    @includeIf('admin.page.include.script.restaurant_script_js')
@endsection


