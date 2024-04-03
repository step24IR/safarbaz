<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(20);
        return view('admin.comment.index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        return view('admin.comment.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('message' , 'کامنت موردنظر با موفقیت حذف شد.');
    }

    public function changeApprove(Comment $comment)
    {
        if ($comment->getRawOriginal('approved')) {
            $comment->update([
                'approved' => 0
            ]);
        } else {
            $comment->update([
                'approved' => 1
            ]);
        }

        return redirect()->route('admin.comment.index');
    }

}
