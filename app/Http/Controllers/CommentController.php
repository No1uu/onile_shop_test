<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(Request $request , $id)
    {
        $validated = $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'comment' => $validated['comment'],
        ]);

        return redirect()->back();
    }
}
