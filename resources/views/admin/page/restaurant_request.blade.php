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
            <div class="card-header flex-column flex-md-row pb-0">
                <div class="head-label d-flex align-items-center justify-content-between w-100">
                    <h5 class="card-title mb-0">Restaurant Request List</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table
                    class="table table-bordered table-responsive data-table datatables-basic border-top dataTable dtr-column">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Code</th>
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
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('restaurant-request.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'logo',
                        name: 'logo',
                        render: function (data) {
                            return '<img src="/storage/' + data + '" height="50px" width="50px" >';
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'restaurant_code',
                        name: 'restaurant_code'
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

            $(document).on('click', '.requestStatusBtn', function (event) {
                event.preventDefault();

                var restaurant_id = $(this).data('restaurant-id');
                var restaurant_status = $(this).data('request-status');

                var $this = $(this);
                var $buttons = $('.requestStatusBtn');
                var $row = $this.closest('tr');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    customClass: { confirmButton: "btn btn-primary me-3", cancelButton: "btn btn-label-secondary" },
                    buttonsStyling: !1,
                }).then(function (t) {
                    if (t.value) {
                        $buttons.prop('disabled', true);
                        $.ajax({
                            url: "{{ route('restaurant.approved-declined') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                restaurant_id  : restaurant_id,
                                request_status : restaurant_status
                            },
                            success: function(response) {
                                Swal.fire({ 
                                    icon: "success", 
                                    title: "Deleted!", 
                                    text: "Changes Save Successfully.", 
                                    customClass: { confirmButton: "btn btn-success" } 
                                }).then(function (t) {
                                    $buttons.prop('disabled', false);
                                    $row.fadeOut(500, function() {
                                        table.row($row).remove().draw();
                                    });
                                });
                            },
                            error: function(error) {
                                Swal.fire({ 
                                    icon: "error", 
                                    title: "Error!", 
                                    text: "Error update status.", 
                                    customClass: { confirmButton: "btn btn-danger" } 
                                }).then(function() {
                                    $buttons.prop('disabled', false);
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection


