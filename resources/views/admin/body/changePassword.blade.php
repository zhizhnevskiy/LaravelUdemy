@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Change Password</h2>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">{{ session('success') }}</h4>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Current Password</label>
                                    <input
                                        name="currentPassword"
                                        type="password"
                                        class="form-control"
                                        id="current_password"
                                        placeholder="Current Password"
                                    >
                                    @error('currentPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">New Password</label>
                                    <input
                                        name="password"
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="New Password"
                                    >
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">Confirm Password</label>
                                    <input
                                        name="confirmPassword"
                                        type="password"
                                        class="form-control"
                                        id="password_confirmation"
                                        placeholder="Confirm Password"
                                    >
                                    @error('confirmPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
