<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Comment::create($request->all());

        return redirect()->back()->with('success', 'Yorumunuz eklendi.');
    }
}

