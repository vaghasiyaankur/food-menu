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

    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form id="branchForm" class="modal-content" action="{{ route('branch.create-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Create Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                </div>
                <input class="form-control" type="hidden" name="restaurant_id" id="restaurant_id" />
                <input class="form-control" type="hidden" name="branch_id" id="id" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="logo" class="form-label">Branch Logo</label>
                            <input class="form-control" type="file" id="logo" name="logo" />
                            <img id="imagePreview" src="" alt="Image Preview" >
                            <div>
                                <span id="logo_error" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nameBackdrop" class="form-label">Branch Name</label>
                            <input
                                type="text"
                                name="branch_name"
                                id="branch_name"
                                class="form-control"
                                placeholder="Enter Branch Name"
                            />
                            <div>
                                <span id="branch_name_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="ownerBackdrop" class="form-label">Owner Name</label>
                            <input
                                type="text"
                                name="owner_name"
                                id="owner_name"
                                class="form-control"
                                placeholder="Enter Branch Owner"
                            />
                            <div>
                                <span id="owner_name_error" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="email" class="form-label">Branch Email</label>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="xxxx@xxx.xx"
                            />
                            <div>
                                <span id="email_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="mobile_number" class="form-label">Mobile Number</label>
                            <input
                                type="number"
                                name="mobile_number"
                                id="mobile_number"
                                class="form-control"
                                placeholder="+91-9652310547"
                            />
                            <div>
                                <span id="mobile_number_error" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="address" class="form-label">Branch Address</label>
                            <textarea
                                rows="2"
                                name="address"
                                id="address"
                                class="form-control"
                                placeholder="Enter Branch Address"
                            ></textarea>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="country" class="form-label">Branch Country</label>
                            <input
                                type="text"
                                name="country"
                                id="country"
                                class="form-control"
                                placeholder="Branch Country"
                            />
                        </div>
                        <div class="col mb-3">
                            <label for="zip_code" class="form-label">Branch Zip Code</label>
                            <input
                                type="number"
                                name="zip_code"
                                id="zip_code"
                                class="form-control"
                                placeholder="Enter Zip Code"
                            />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="state" class="form-label">Branch State</label>
                            <input
                                type="text"
                                name="state"
                                id="state"
                                class="form-control"
                                placeholder="Branch State"
                            />
                        </div>
                        <div class="col mb-3">
                            <label for="city" class="form-label">Branch City</label>
                            <input
                                type="text"
                                name="city"
                                id="city"
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

            var myModal = new bootstrap.Modal(document.getElementById('backDropModal'), {
                backdrop  : 'static',
                keyboard  : false
            });

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
            
            $('#logo').change(function(event) {
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
                $("#restaurant_id").val(restaurantId);

                var fields = [ 'logo',  'branch_name',  'owner_name',  'address',  'city',  'zip_code',  'state', 'country', 'mobile_number', 'email'];
                fields.forEach(field => { $(`#${field}_error`).text("") });
            });
    
            $(document).on('submit', '#branchForm', function (e) {
                e.preventDefault();

                var formData = new FormData(this);
                var actionURL = $(this).attr('action');
                var formMethod = $(this).attr('method');

                $.ajax({
                    type: formMethod,
                    url: actionURL,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if(response.status) {
                            myModal.hide();
                            e.target.reset();
                            table.draw();
                        }
                    },
                    error: function (xhr) {
                        var fields = ['logo', 'branch_name', 'owner_name', 'address', 'city', 'zip_code', 'state', 'country', 'mobile_number', 'email'];
                        
                        $.each(fields, function(index, field) {
                            var errorMessage = xhr.responseJSON[field] ? xhr.responseJSON[field][0] : "";
                            $('#' + field + '_error').text(errorMessage);
                        });
                    }
                });
            });

            $(document).on('click', '.editBranch', function (e) {
                e.preventDefault();

                var fields = [ 'logo',  'branch_name',  'owner_name',  'address',  'city',  'zip_code',  'state', 'country', 'mobile_number', 'email'];
                fields.forEach(field => { $(`#${field}_error`).text("") });

                var branchEditId = $(this).data('id');
                var url = "{{ route('branch.edit', ':id') }}";
                url = url.replace(':id', branchEditId);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function (response) {
                        if (response.status) {
                            myModal.show();

                            var $branchForm = $("#branchForm");
                            var $elements = $branchForm.find("input, textarea, img");

                            $elements.each(function() {
                                var $element = $(this);
                                var elementId = $element.attr("id");

                                if (response.branch.hasOwnProperty(elementId)) {
                                    if ($element.is("textarea")) {
                                        $element.text(response.branch[elementId]);
                                    } else if ($element.attr("type") == 'file') {
                                        return;
                                    } else {
                                        $element.val(response.branch[elementId]);
                                    }
                                }
                            });

                            if (response.branch.logo) {
                                var $imagePreview = $("#imagePreview");
                                $imagePreview.attr("src", '/storage/' + response.branch.logo);
                                $imagePreview.addClass("d-block");
                            }
                        }
                    }

                });
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


