<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'comments' => 'required',
        ]);

        $comment = new PostComment();
        $comment->post_id = $data['post_id'];
        // Nếu muốn lấy user_id từ user đang đăng nhập:
        $comment->user_id = auth()->id();
        $comment->comment = $data['comments'];
        $comment->save();

        return redirect()->back()->with('success', 'Bình luận đã được gửi');
    }
}
