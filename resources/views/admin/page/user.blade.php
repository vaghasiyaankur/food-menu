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
                @includeIf('admin.page.include.header', ['route' => route('super-admin.restaurant'), 'title' => 'Users', 'button' => true, 'name' => 'addUser', 'back' => true])
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
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                <option value="waiter" {{ old('role') == 'waiter' ? 'selected' : '' }}>Waiter</option>
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
    @includeIf('admin.page.include.script.user_script_js')
@endsection
