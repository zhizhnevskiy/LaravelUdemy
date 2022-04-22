@extends('admin.admin_master')

@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create Slider</h2>
            </div>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">{{ session('success') }}</h4>
                </div>
            @endif
            <div class="card-body">
                <form
                    action="{{ route('store.slider') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="Title"
                        >
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            rows="3"
                            name="description"
                        ></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image</label>
                        <input
                            type="file"
                            class="form-control-file"
                            id="exampleFormControlFile1"
                            name="image"
                        >
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
