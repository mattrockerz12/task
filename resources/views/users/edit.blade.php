@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm mb-2" href="{{ route('user.index') }}">Back</a>
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="firstname">First Name</label>
                                <input class="form-control" type="text" name="firstname" id="firstname" value="{{ $user->firstname }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="middlename">Middle Name</label>
                                <input class="form-control" type="text" name="middlename" id="middlename" value="{{ $user->middlename }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="lastname">Last Name</label>
                                <input class="form-control" type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="roles">Role</label>
                                <select class="form-control" id="roles"  name="roles">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ in_array($role->name, $userRoles) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
