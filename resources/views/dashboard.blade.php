<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            {{ __('Dashboard') }}--}}
            Hi... <b>{{ Auth::user()->name }}</b>
            <b style="float:right;">Total users:
                <span class="badge bg-danger">{{ count($users) }}</span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForhumans() }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
        {{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
        {{--                <x-jet-welcome />--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
</x-app-layout>
