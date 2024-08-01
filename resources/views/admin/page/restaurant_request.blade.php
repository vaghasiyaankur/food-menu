@extends('admin.layout.master')

@section('title', 'Restaurant Requests')

@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}">
@endsection

@section('content')
    @if (session('success'))
        <div class="bs-toast toast toast-ex animate__animated my-2 fade bg-primary animate__bounceInRight show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2500">
            <div class="toast-header">
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-datatable table-responsive">
            @includeIf('admin.page.include.header', ['title' => 'Restaurant Request List' , 'button' => false, 'back' => false])
            <x-table-header :headers="['No', 'Logo', 'Name', 'Location', 'Code', 'Action']" />
        </div>
    </div>
</div>

<x-restaurant-details />
<x-declined-reason-modal />

@endsection

@section('script')
    @includeIf('admin.page.include.script.restaurant_request_script_js')
@endsection


