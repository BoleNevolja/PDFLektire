<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        $data = [
            "user" => $user,
        ];
        return view("user.index",$data);
    }
}
