@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h4>About</h4>
                    <br>
                    <a href="{{ route('add.about') }}">
                        <button class="btn btn-info mb-4">Add About</button>
                    </a>

                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading"> {{ session('success') }} </h4>
                            </div>
                        @endif
                        <div class="card-header">About</div>
                        <div class="card-body m-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                {{--                                @php($number = 1)--}}
                                @foreach($abouts as $about)
                                    <tr>
                                        <th scope="row">{{$abouts->firstItem()+$loop->index}}</th>

                                        <td> {{$about->title}} </td>
                                        <td> {{$about->short_description}} </td>
                                        <td> {{$about->long_description}} </td>
                                        <td>
                                            <a href="{{ url('about/edit/'.$about->id) }}"
                                               class="btn btn-info"
                                            >
                                                Edit
                                            </a>
                                            <a href="{{ url('about/delete/'.$about->id) }}"
                                               class="btn btn-danger"
                                               onclick="return confirm('Are you sure to delete')"
                                            >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $abouts->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

