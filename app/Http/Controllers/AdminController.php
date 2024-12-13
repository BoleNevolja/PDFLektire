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
        $books = Book::where("status",1)->get();
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

    public function reply($id){
        $notification = Notification::findOrFail($id);
        if(Auth::user()->id != $notification->user_id){
            return abort(403, "Neovlašteno");
        }
        $msg_id = $notification->content_id;
        $answer = Answer::findOrFail($msg_id);
        $msg_id = $answer->message_id;
        $message = Message::findOrFail($msg_id);
        $data = [
            'notification' => $notification,
            'answer' => $answer,
            'message' => $message,
        ];
        return view('notification.nots', $data);
    }

    public function accept(Request $request){
        $bookId = $request->input('id');
        $book = Book::findOrFail($bookId);
        $book->status = 2;
        $book->save();
        $id = $book->user_id;
        $user = User::findOrFail($id);
        $user->author = 1;
        $user->save();

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->content_id = $book->id;
        $notification->content_type = 3;
        $notification->status = 1;
        $t = "Vaša knjiga je odobrena. Proverite!";
        $notification->short_text = $t;
        $notification->save();

        return response()->json(['message' => 'Success']);    
    }

    public function reject(Request $request){
        $bookId = $request->input('id');
        $book = Book::findOrFail($bookId);
        $book->delete();
        $id = $book->user_id;
        $user = User::findOrFail($id);

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->content_id = "###";
        $notification->content_type = 4;
        $notification->status = 1;
        $t = "Vaša knjiga je odbijena. Žao nam je!";
        $notification->short_text = $t;
        $notification->save();

        $thumbnailPath = public_path($book->thumbnail);
        $filePath = public_path($book->file_path);
        unlink($thumbnailPath);
        unlink($filePath);
        return response()->json(['message' => 'Success']);    
    }

    public function remove(Request $request){
        $bookId = $request->input('id');
        $book = Book::findOrFail($bookId);
        $book->delete();
        $thumbnailPath = public_path($book->thumbnail);
        $filePath = public_path($book->file_path);
        unlink($thumbnailPath);
        unlink($filePath);
        return response()->json(['message' => 'Success']);   
    }
}
