<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    public function sent(){
        return 0;
    }
    
    public function chat(){
        return view("admin.chat");
    }
}
