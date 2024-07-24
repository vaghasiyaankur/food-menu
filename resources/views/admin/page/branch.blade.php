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

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive">
                @includeIf('admin.page.include.header', ['route' => route('super-admin.restaurant'), 'title' => 'Branch List' , 'button' => true, 'name' => 'addBranch', 'back' => true])
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
                            <input class="form-control" type="file" id="logo" name="logo" accept="image/*" />
                            <img id="imagePreview" src="" alt="Image Preview" />
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
    @includeIf('admin.page.include.script.branch_script_js')
@endsection
