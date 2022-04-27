@extends('admin.admin_master')

@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit About</h2>
            </div>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">{{ session('success') }}</h4>
                </div>
            @endif
            <div class="card-body">
                <form
                    action="{{ url('about/update/'.$about->id) }}"
                    method="POST"
                >
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            id="exampleFormControlInput1"
                            value="{{ $about->title }}"
                        >
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short Description</label>
                        <textarea
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            rows="2"
                            name="short_description"
                        >{{ $about->short_description }}</textarea>
                        @error('short_description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Long Description</label>
                        <textarea
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            rows="10"
                            name="long_description"
                        >{{ $about->long_description }}</textarea>
                        @error('long_description')
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
