@extends('admin.layout.master')

@section('title', 'User')

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
            <form id="#" class="modal-content" action="{{ route('user.create') }}" method="POST">
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
                <input class="form-control" type="hidden" name="restaurant_id" id="restaurant" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="user_name" class="form-label">Name</label>
                            <input 
                                class="form-control" 
                                type="text" 
                                id="user_name" 
                                name="name"
                                placeholder="Enter Name"
                            />
                            @error('name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBackdrop" class="form-label">Email</label>
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
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="passwordBackdrop" class="form-label">Password</label>
                            <input
                                type="text"
                                name="password"
                                id="passwordBackdrop"
                                class="form-control"
                                placeholder="Enter Password"
                            />
                            @error('password')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="confPassBackdrop" class="form-label">Confirmation Password</label>
                            <input
                                type="text"
                                name="password_confirmation"
                                id="confPassBackdrop"
                                class="form-control"
                                placeholder="Re-Enter Password"
                            />
                            @error('password_confirmation')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Role</label>
                            <select name="role" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected="" disabled>Select User Role</option>
                                <option value="manager">Manager</option>
                                <option value="waiter">Waiter</option>
                                <option value="admin">Admin</option>
                                <option value="super_admin">Super Admin</option>
                            </select>
                            @error('role')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="stateBackdrop" class="form-label">Lock Pin</label>
                            <input
                                type="number"
                                name="lock_pin"
                                id="stateBackdrop"
                                class="form-control"
                                placeholder="Enter Lock Pin"
                            />
                            @error('lock_pin')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label class="switch switch-square switch-lg">
                                <input type="checkbox" class="switch-input" name="lock_enable">
                                <span class="switch-label">Lock Status</span>
                            </label>
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
            
            @if ($errors->any())
                var myModal = new bootstrap.Modal(document.getElementById('backDropModal'), {
                    backdrop  : 'static',
                    keyboard  : false
                });
                myModal.show();
            @endif

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

            $(document).on('click', '.addUser', function (e) {
                e.preventDefault();
                $("#restaurant").val(restaurantId);
            });
        });
    </script>
@endsection
