@extends('admin.layout.master')

@section('title', $title)

@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}">
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-datatable table-responsive">
            @includeIf('admin.page.include.header', ['title' => $headerTitle, 'button' => $button, 'back' => $back, 'route' => $route])

            @if (Route::currentRouteName() == 'super-admin.declined-restaurant')
                @php
                    $headers = ['No', 'Logo', 'Name', 'Location', 'Decline Reason', 'Status', 'Action'];    
                @endphp
            @else 
                @php
                    $headers = ['No', 'Logo', 'Name', 'Location', 'Status', 'Open Time', 'Close Time', 'Action'];
                @endphp
            @endif
            <x-table-header :headers="$headers" />
        </div>
    </div>
</div>

<x-restaurant-details />

@endsection

@section('script')
    @includeIf('admin.page.include.script.restaurant_script_js')
@endsection
