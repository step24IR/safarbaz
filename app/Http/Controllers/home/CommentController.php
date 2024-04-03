<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'text' => 'required|min:5|max:7000'
        ]);

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text,
            'post_id' => $request->post_id,
            'approved' => 0
        ]);

        return back()->with('message','کامنت شما با موفقیت ثبت شد بعد از تایید نمایش داده می شود.');
    }
}
