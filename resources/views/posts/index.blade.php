@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" x-data="Post()">
            <div class="card">
                <template x-if="!is_adding && !is_editing">
                    <div class="card-body">
                        <a x-on:click="Adding()" href="javascript:void(0)" class="btn btn-primary">Create Post</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <template x-for="post in posts" :key="post.id">
                                    <tr>
                                        <td x-text='post.id'></td>
                                        <td x-text='post.title'></td>
                                        <td x-text='post.body'></td>
                                        <td>
                                            <div class="btn-group">
                                                <a x-on:click="editPost(post.id)" href="javascript:void(0)" class="btn btn-primary">Edit</a>
                                                <form x-on:submit.prevent="deletePost(post.id)">
                                                    @csrf
                                                    <button type="submit" class='btn btn-danger'>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </template>
                <template x-if="is_adding">
                    <div class="card-body">
                        <a x-on:click="is_adding = !is_adding" href="javascript:void(0)" class="btn btn-primary">Back</a>
                        <form x-on:submit.prevent="addPost">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" >Title</label>
                                <input class="form-control" type="text" name="title"  x-model="form.title" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" >Body</label>
                                <textarea class="form-control" name="body"  cols="30" rows="10" x-model="form.body"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </template>
                <template x-if="is_editing">
                    <div class="card-body">
                        <a x-on:click="is_editing = !is_editing" href="javascript:void(0)" class="btn btn-primary">Back</a>
                        <form x-on:submit.prevent="updatePost(form.id)">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" type="text" name="title" id="title" x-model="form.title" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="body">Body</label>
                                <textarea class="form-control" name="body" id="body" cols="30" rows="10" x-model="form.body"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/posts.js') }}"></script>
@endpush

@endsection
