@extends('admin.admin_master')

@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Contact</h2>
            </div>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">{{ session('success') }}</h4>
                </div>
            @endif
            <div class="card-body">
                <form
                    action="{{ url('admin/update/contact/'.$contact->id) }}"
                    method="POST"
                >
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            rows="2"
                            name="address"
                        >{{ $contact->address }}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input
                            type="text"
                            name="email"
                            class="form-control"
                            id="exampleFormControlInput1"
                            value="{{ $contact->email }}"
                        >
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            id="exampleFormControlInput1"
                            value="{{ $contact->phone }}"
                        >
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
