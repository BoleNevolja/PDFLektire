<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;
use App\Models\Download;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function status(){
        if(Auth::user()->role != 2){
            return abort(403, "Neovlašteno");
        }
        $books = Book::where("status",1);
        $data = [
            "books" => $books,
        ];
        return view("admin.status", $data);
    }

    public function sent(Request $request){
        $message = new Message;
        $message->user_id = Auth::user()->id;
        $message->subject = $request->subject;
        $message->content = $request->content;
        $message->status = 1;
        $message->save();
        return redirect()->back();
    }
    
    public function chat(){
        $messages = Message::where("status",1)->with("user")->get();
        $data = [
            "messages" => $messages,
        ];
        return view("admin.chat",$data);
    }
}
