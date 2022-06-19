<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function commentList()
    {
        $comments = CommentResource::collection(Comment::with('user')->get());

        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = Comment::create([
            'body' => $request->input('body'),
            'user_id' => Auth::id(),
            'post_id' => $request->input('post_id')
        ]);

        return response($comment, Response::HTTP_CREATED);
    }
}
