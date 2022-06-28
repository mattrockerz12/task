@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{ route('user.create') }}">Create Users</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                <form action="{{ route('user.delete', $user->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger" type='submit'>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
