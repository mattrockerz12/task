@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Posts</div>
                <div class="card-body">
                    <form action="{{ route('post.update', $post->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="body">Body</label>
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
