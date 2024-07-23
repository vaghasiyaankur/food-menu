@extends('admin.layout.master')

@section('title', 'User')

@section('css')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}">

    <style>
        .switch-label {
    display: block; /* Ensures label is on its own line */
    margin-bottom: 5px; /* Adds some space between the label and the checkbox */
    font-weight: bold; /* Optional: Makes the label text bold */
}

.switch {
    display: block; /* Ensures the switch is on a new line */
}
    </style>
@endsection

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="card-header flex-column flex-md-row pb-0">
                    <div class="head-label d-flex align-items-center justify-content-between w-100">
                        <h5 class="card-title mb-0">Users</h5>
                        <div>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#backDropModal" class="btn btn-primary addUser">Add</button>
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

    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form id="userForm" class="modal-content" action="{{ route('user.create-update') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Create User</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                <input class="form-control" type="hidden" name="restaurant_id" id="restaurant_id" />
                <input class="form-control" type="hidden" name="user_id" id="id" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="user_name" class="form-label">Name</label>
                            <input 
                                class="form-control" 
                                type="text" 
                                id="name" 
                                name="name"
                                placeholder="Enter Name"
                                value="{{ old('name') }}"
                            />
                            <div>
                                <span id="name_error" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBackdrop" class="form-label">Email</label>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="xxxx@xxx.xx"
                                value="{{ old('email') }}"
                            />
                            <div>
                                <span id="email_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="dobBackdrop" class="form-label">Mobile Number</label>
                            <input
                                type="number"
                                name="mobile_number"
                                id="mobile_number"
                                class="form-control"
                                placeholder="+91-9652310547"
                                value="{{ old('mobile_number') }}"
                            />
                            <div>
                                <span id="mobile_number_error" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="passwordBackdrop" class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Enter Password"
                            />
                            <div>
                                <span id="password_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="confPassBackdrop" class="form-label">Confirmation Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                placeholder="Re-Enter Password"
                            />
                            <div>
                                <span id="password_confirmation_error" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" class="form-select" id="role" aria-label="Default select example">
                                <option value="" selected="" disabled>Select User Role</option>
                                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                <option value="waiter" {{ old('role') == 'waiter' ? 'selected' : '' }}>Waiter</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                            </select>
                            <div>
                                <span id="role_error" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="stateBackdrop" class="form-label">Lock Pin</label>
                            <input
                                type="number"
                                name="lock_pin"
                                id="lock_pin"
                                class="form-control"
                                placeholder="Enter Lock Pin"
                                value="{{ old('lock_pin') }}"
                            />
                            <div>
                                <span id="lock_pin_error" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Lock Status</label>
                            <label class="switch switch-square">
                                <input type="checkbox" id="lock_enable" class="switch-input" name="lock_enable" {{ old('lock_enable') ? 'checked' : '' }}>
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="submit" class="btn btn-primary userSubmit">Save</button>
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

            $(document).on('click', '.addUser', function (e) {
                e.preventDefault();
                resetUserForm(1);
                $("#restaurant_id").val(restaurantId);

                var fields = [ 'name',  'email',  'mobile_number',  'password',  'password_confirmation',  'role',  'lock_pin'];
                fields.forEach(field => { $(`#${field}_error`).text("") });

                $("#backDropModalTitle").text("Add User");
                $(".userSubmit").text("Save");
            });

            $(document).on('submit', '#userForm', function (e) {
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
                            table.draw();
                            $("#backDropModalTitle").text("Add User");
                            $(".userSubmit").text("Save");
                            getSuccessMessage(response.success);
                        }
                    },
                    error: function (xhr) {
                        var fields = ['name', 'email', 'mobile_number', 'password', 'password_confirmation', 'role', 'lock_pin'];
                        $.each(fields, function(index, field) {
                            var errorMessage = xhr.responseJSON[field] ? xhr.responseJSON[field][0] : "";
                            $(`#${field}_error`).text(errorMessage);
                        });
                    }
                });
            });

            $(document).on('click', '.editUser', function (e) {
                e.preventDefault();

                var fields = [ 'name',  'email',  'mobile_number',  'password',  'password_confirmation',  'role',  'lock_pin'];
                fields.forEach(field => { $(`#${field}_error`).text("") });

                var id = $(this).data('id');
                var url = "{{ route('user.edit', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function (response) {
                        if(response.status) {
                            myModal.show();
                            $(".userSubmit").text("Update");
                            $("#backDropModalTitle").text("Edit User");

                            var formDetail = $("#userForm");
                            var elements = formDetail.find("input, select");

                            elements.each(function() {
                                var element = $(this);
                                var elementId = element.attr("id");
                                if (response.user.hasOwnProperty(elementId)) {
                                    if (element.attr("type") === "checkbox" && elementId === "lock_enable") {
                                        element.prop('checked', response.user[elementId] == 1);
                                    } else {
                                        element.val(response.user[elementId]);
                                    }
                                }
                            });

                        }
                    }, 
                    error : function(error) {
                        console.error('Fetch User Detail Error : ', error);
                    }
                });
            });

            $(document).on('click', '.deleteUser', function (event) {
                event.preventDefault();

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
                            url: "{{ route('user.delete') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                user_id : rowData.id,
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

            function getSuccessMessage(message) {
                if(message) resetUserForm(0);
                var toastHTML = `
                    <div id="ajax-toast" class="bs-toast toast toast-ex animate__animated my-2 fade bg-primary animate__bounceInRight show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2500">
                        <div class="toast-header">
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <span id="ajax-toast-message">${message}</span>
                        </div>
                    </div>
                `;

                $('body').append(toastHTML);
                $('#ajax-toast').toast({ delay: 2500 }).toast('show');
                
            }

            function resetUserForm(type) {
                if(type == 0) {
                    $("#restaurant_id").val("");
                }
                $("#id").val("");
                $("#name").val("");
                $("#email").val("");
                $("#password").val("");
                $("#password_confirmation").val("");
                $("#mobile_number").val("");
                $("#role").val("");
                $("#lock_pin").val("");
                $("#lock_enable").val("");
            }
        });
    </script>
@endsection
