@extends('admin.layout.master')

@section('title', 'Branch')

@section('css')
    <style>
        #imagePreview {
            display: none;
            margin-top: 10px;
            width: 100px;
            height: 100px;
        }
    </style>
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
                        <h5 class="card-title mb-0">Branch List</h5>
                        <div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#backDropModal" class="btn btn-primary addBranch">Add</button>
                            <a href="{{ route('super-admin.restaurant') }}" class="btn btn-primary ms-2">Back</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table
                        class="table table-bordered table-responsive data-table datatables-basic border-top dataTable dtr-column">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Email</th>
                                <th>Branch Name</th>
                                <th>Owner Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Branch Create Modal --}}
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form id="#" class="modal-content" action="{{ route('branch.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Create Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <input class="form-control" type="hidden" name="restaurant_id" id="restaurant" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="formFile" class="form-label">Branch Logo</label>
                            <input class="form-control" type="file" id="formFile" name="logo" />
                            <img id="imagePreview" src="" alt="Image Preview" >
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nameBackdrop" class="form-label">Branch Name</label>
                            <input
                                type="text"
                                name="branch_name"
                                id="nameBackdrop"
                                class="form-control"
                                placeholder="Enter Branch Name"
                            />
                            @error('branch_name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="ownerBackdrop" class="form-label">Owner Name</label>
                            <input
                                type="text"
                                name="owner_name"
                                id="ownerBackdrop"
                                class="form-control"
                                placeholder="Enter Branch Owner"
                            />
                            @error('owner_name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBackdrop" class="form-label">Branch Email</label>
                            <input
                                type="text"
                                name="email"
                                id="emailBackdrop"
                                class="form-control"
                                placeholder="xxxx@xxx.xx"
                            />
                            @error('email')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="dobBackdrop" class="form-label">Mobile Number</label>
                            <input
                                type="number"
                                name="mobile_number"
                                id="dobBackdrop"
                                class="form-control"
                                placeholder="+91-9652310547"
                            />
                            @error('mobile_number')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Branch Address</label>
                            <textarea
                                rows="2"
                                name="address"
                                id="exampleFormControlTextarea1"
                                class="form-control"
                                placeholder="Enter Branch Address"
                            ></textarea>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="countryBackdrop" class="form-label">Branch Country</label>
                            <input
                                type="text"
                                name="country"
                                id="countryBackdrop"
                                class="form-control"
                                placeholder="Branch Country"
                            />
                        </div>
                        <div class="col mb-3">
                            <label for="codeBackdrop" class="form-label">Branch Zip Code</label>
                            <input
                                type="number"
                                name="zip_code"
                                id="codeBackdrop"
                                class="form-control"
                                placeholder="Enter Zip Code"
                            />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="stateBackdrop" class="form-label">Branch State</label>
                            <input
                                type="text"
                                name="state"
                                id="stateBackdrop"
                                class="form-control"
                                placeholder="Branch State"
                            />
                        </div>
                        <div class="col mb-3">
                            <label for="cityBackdrop" class="form-label">Branch City</label>
                            <input
                                type="text"
                                name="city"
                                id="cityBackdrop"
                                class="form-control"
                                placeholder="Enter Branch City"
                            />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="submit" class="btn btn-primary branchSubmit">Save</button>
                </div>
            </form>
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

            @if ($errors->any())
                
                $("#restaurant").val(restaurantId);

                var myModal = new bootstrap.Modal(document.getElementById('backDropModal'), {
                    backdrop  : 'static',
                    keyboard  : false
                });
                myModal.show();
            @endif

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{ route('branch.list') }}",
                    data: {
                        restaurant_id: restaurantId
                    }
                },
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
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'branch_name',
                        name: 'branch_name'
                    },
                    {
                        data: 'owner_name',
                        name: 'owner_name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'state',
                        name: 'state'
                    },
                    {
                        data: 'country',
                        name: 'country'
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
            
            $('#formFile').change(function(event) {
                event.preventDefault();
    
                var reader = new FileReader();
                var file = event.target.files[0];
    
                if (file) {
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#imagePreview').hide();
                }
            });
    
            $(document).on('click', '.addBranch', function (e) {
                e.preventDefault();
                $("#restaurant").val(restaurantId);
            });
    
            $(document).on('submit', '#branchForm', function (e) {
                e.preventDefault();
                $("#restaurant").val("");
                $('#imagePreview').attr('src', "");
                e.target.reset();
            });
    
            $(document).on('click', '.deleteBranch', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var rowData = table.row(row).data();

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
                        $.ajax({
                            url: "{{ route('branch.delete') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                branch_id : rowData.id,
                                restaurant_id : rowData.restaurant_id
                            },
                            success: function(response) {
                                Swal.fire({ 
                                    icon: "success", 
                                    title: "Deleted!", 
                                    text: "Changes Save Successfully.", 
                                    customClass: { confirmButton: "btn btn-success" } 
                                }).then(function (t) {
                                    row.fadeOut(500, function() {
                                        table.row(row).remove().draw();
                                    });
                                });
                            },
                            error: function(error) {
                                Swal.fire({ 
                                    icon: "error", 
                                    title: "Error!", 
                                    text: "Error deleting data.", 
                                    customClass: { confirmButton: "btn btn-danger" } 
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection


