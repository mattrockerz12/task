<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
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
