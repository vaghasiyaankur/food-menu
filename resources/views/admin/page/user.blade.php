@extends('admin.layout.master')

@section('title', 'User')

@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}">
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="card-header flex-column flex-md-row pb-0">
                    <div class="head-label d-flex align-items-center justify-content-between w-100">
                        <h5 class="card-title mb-0">Users</h5>
                        <a href="{{ route('super-admin.restaurant') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table
                        class="table table-bordered table-responsive data-table datatables-basic border-top dataTable dtr-column">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script type="text/javascript">
        $(function() {
            
            var urlPath = window.location.pathname;
            var restaurantId = urlPath.split('/').pop(); 

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{ route('users.list') }}",
                    data: {
                        restaurant_id: restaurantId
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('select[name="DataTables_Table_0_length"]').addClass('form-select');

            $('.dataTables_filter input').addClass('form-control');

        });
    </script>
@endsection
