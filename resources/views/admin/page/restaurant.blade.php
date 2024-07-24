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
@endsection

@section('script')
    @includeIf('admin.page.include.script.restaurant_script_js')
@endsection


