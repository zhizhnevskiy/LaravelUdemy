@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h4>Messages</h4>
                    <br>
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">{{ session('success') }}</h4>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All messages</div>
                        <div class="card-body m-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Messsage</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                {{--                                @php($number = 1)--}}
                                @foreach($messages as $message)
                                    <tr>
                                        <th scope="row">{{$messages->firstItem()+$loop->index}}</th>

                                        <td> {{$message->name}} </td>
                                        <td> {{$message->email}} </td>
                                        <td> {{$message->subject}} </td>
                                        <td> {{$message->message}} </td>
                                        <td>
                                            <a href="{{ url('message/delete/'.$message->id) }}"
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
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

