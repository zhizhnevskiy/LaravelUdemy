@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h4>Home Slider</h4>
                    <br>
                    <a href="{{ route('add.slider') }}"><button class="btn btn-info mb-4">Add Slider</button></a>

                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading"> {{ session('success') }} </h4>
                            </div>
                        @endif
                        <div class="card-header">Slider</div>
                        <div class="card-body m-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                {{--                                @php($number = 1)--}}
                                @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{$sliders->firstItem()+$loop->index}}</th>

                                        <td> {{$slider->title}} </td>
                                        <td> {{$slider->description}} </td>
                                        <td><img
                                                src="{{ asset($slider->image) }}"
                                                style="height: 70px"
                                            ></td>
                                        <td>
                                            <a href="{{ url('slider/delete/'.$slider->id) }}"
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
                            {{ $sliders->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

