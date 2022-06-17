@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm" href="{{ route('role.index') }}">Back</a>
                        <form action="{{ route('role.update', $role->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}" />
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('role.givePermission', $role->id) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="permission">Permissions</label>
                                    <select class="form-select" id="permission" name="permission" aria-label="Default select example">
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
