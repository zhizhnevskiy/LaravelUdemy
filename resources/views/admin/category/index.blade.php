<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            {{ __('Dashboard') }}--}}
            All category <b></b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">{{ session('success') }}</h4>
                            </div>
                        @endif
                        <div class="card-header">All Category</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                {{--                                @php($number = 1)--}}
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>

                                        <td>{{$category->category_name}}</td>

                                        {{--Join Eloquent ORM--}}
                                        <td>{{$category->user->name}}</td>

                                        {{--Join Query Builder--}}
                                        {{--                                        <td>{{$category->name}}</td>--}}

                                        <td>
                                            @if(empty($category->created_at))
                                                <span class="text-danger"> No Date set</span>
                                            @else
                                                {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ url('category/edit/'.$category->id) }}"
                                               class="btn btn-info">
                                                Edit
                                            </a>
                                            <a href="{{ url('category/delete/'.$category->id) }}"
                                               class="btn btn-danger">
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text"
                                           name="category_name"
                                           class="form-control"
                                           id="exampleInputEmail1"
                                           aria-describedby="emailHelp">
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{--trash part--}}
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trash Category</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                {{--                                @php($number = 1)--}}
                                @foreach($trashCategory as $category)
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>

                                        <td>{{$category->category_name}}</td>

                                        {{--Join Eloquent ORM--}}
                                        <td>{{$category->user->name}}</td>

                                        {{--Join Query Builder--}}
                                        {{--                                        <td>{{$category->name}}</td>--}}

                                        <td>
                                            @if(empty($category->created_at))
                                                <span class="text-danger"> No Date set</span>
                                            @else
                                                {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ url('category/restore/'.$category->id) }}"
                                               class="btn btn-info">
                                                Restore
                                            </a>
                                            <a href="{{ url('category/permanentDelete/'.$category->id) }}"
                                               class="btn btn-danger">
                                                Permanent Delete
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $trashCategory->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
