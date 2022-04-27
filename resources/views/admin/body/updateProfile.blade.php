@extends('admin.admin_master')

@section('admin')

    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>User Profile</h2>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">{{ session('success') }}</h4>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('profile.change') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">User name</label>
                                    <input
                                        name="name"
                                        type="text"
                                        class="form-control"
                                        value="{{ $user->name }}"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput3">User email</label>
                                    <input
                                        name="email"
                                        type="text"
                                        class="form-control"
                                        value="{{ $user->email }}"
                                    >
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
