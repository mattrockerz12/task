@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm mb-2" href="{{ route('role.index') }}">Back</a>
                        <form action="{{ route('role.update', $role->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}" />
                            </div>
                            <div class="mb-3">
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="{{ $permission->name }}" name="permissions[]" value="{{ old('permissions', $permission->id) }}" {{ in_array($permission->id, $permissionCollection) ? 'checked' : ''}} />
                                        <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
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
