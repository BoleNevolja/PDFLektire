<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;
use App\Models\Answer;
use App\Models\Notification;
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

    public function respond(Request $request){
        $answer = new Answer;
        $answer->user_id = $request->usr_id;
        $answer->message_id = $request->msg_id;
        $answer->content = $request->reply;
        $answer->status = 1;
        $answer->save();

        $id = $request->msg_id;
        $message = Message::findOrFail($id);
        $message->status = 2;
        $message->save();

        $notification = new Notification;
        $notification->user_id = $request->usr_id;
        $notification->content_id = $request->msg_id;
        $notification->content_type = 1;
        $notification->status = 1;
        $t = "Administratori su odgovorili na Vašu poruku. Proverite!";
        $notification->short_text = $t;
        $notification->save();

        return redirect("/chat");
    }
}
