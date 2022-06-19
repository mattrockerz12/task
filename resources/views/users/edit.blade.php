@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm" href="{{ route('user.index') }}">Back</a>
                        <form>
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
                                <input class="form-control" type="password" name="password" id="password" value="{{ $user->password }}" />
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
