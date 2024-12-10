<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;
use Carbon\Carbon;
use App\Models\Download;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request){
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->book_id = $request->bookid;
        $comment->save();
        return redirect()->back();

    }

    public function remove(Request $request){
    $commentId = $request->input('id');
    $comment = Comment::find($commentId);
    $comment->delete();
    return response()->json(['message' => 'Comment deleted successfully']);
}
}
