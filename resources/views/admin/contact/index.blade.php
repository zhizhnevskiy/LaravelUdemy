@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h4>Contact</h4>
                    <br>
                    <a href="{{ route('add.contact') }}">
                        <button class="btn btn-info mb-4">Add Contact</button>
                    </a>

                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading"> {{ session('success') }} </h4>
                            </div>
                        @endif
                        <div class="card-header">All contacts</div>
                        <div class="card-body m-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                {{--                                @php($number = 1)--}}
                                @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{$contacts->firstItem()+$loop->index}}</th>

                                        <td> {{$contact->address}} </td>
                                        <td> {{$contact->email}} </td>
                                        <td> {{$contact->phone}} </td>
                                        <td>
                                            <a href="{{ url('admin/edit/contact/'.$contact->id) }}"
                                               class="btn btn-info"
                                            >
                                                Edit
                                            </a>
                                            <a href="{{ url('admin/delete/contact/'.$contact->id) }}"
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
                            {{ $contacts->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

