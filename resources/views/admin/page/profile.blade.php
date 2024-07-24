@extends('admin.layout.master')

@section('title', 'Profile')

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
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Detail</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('images/user.png') }}" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary btn-md me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/*" />
                                </label>
                                <button type="button" class="btn btn-md btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, JPEG, WEBP or PNG. Max size of 1024K </p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" action="{{ route('super-admin.profile.update') }}" method="POST">
                            @csrf
                            @isset($user)
                                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" />
                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="firstName" class="form-label">Name</label>
                                        <input class="form-control mb-2" type="text" id="firstName" name="name"
                                            value="{{ $user->name }}" autofocus />
                                        @error('name')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="john.doe@example.com" />
                                        @error('email')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="phoneNumber" name="mobile_number" class="form-control"
                                                value="{{ $user->mobile_number }}" placeholder="+91-9632514268" />
                                            </div>
                                            @error('mobile_number')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    
                                    <div class="mb-4 col-md-6">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="role" class="select2 form-select">
                                            <option value="">Select Role</option>
                                            <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="waiter" {{ $user->role == 'waiter' ? 'selected' : '' }}>Waiter</option>
                                            <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                                        </select>
                                        @error('role')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4 col-md-6">
                                        <label for="lock_pin" class="form-label">Lock Pin</label>
                                        <input class="form-control" type="text" id="lock_pin" name="lock_pin"
                                            value="{{ $user->lock_pin }}" placeholder="1234" />
                                            @error('lock_pin')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="col mb-4">
                                        <label class="form-label">Lock Status</label>
                                        <div class="mt-1">
                                            <label class="switch switch-square">
                                                <input type="hidden" name="lock_enable" class="switch-input" value="0">
                                                <input type="checkbox" id="lock_enable" value="1" class="switch-input" name="lock_enable" {{ $user->lock_enable == 1 ? 'checked' : '' }}>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                </div>
                            @endisset
                        </form>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?
                                </h6>
                                <p class="mb-0">Once you delete your account, there is no going back. Please be
                                    certain.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                    id="accountActivation" />
                                <label class="form-check-label" for="accountActivation">I confirm my account
                                    deactivation</label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate
                                Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
