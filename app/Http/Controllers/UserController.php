<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        $downloads = Download::where('user_id', $id)
                          ->with('book') 
                          ->latest()      
                          ->get();
        $data = [
            "user" => $user,
            "downloads" => $downloads,
        ];
        return view("user.index",$data);
    }

    public function settings($id){
        $user = User::findOrFail($id);
        $data = [
            "user" => $user,
        ];
        return view("settings", $data);
    }

    public function edit(Request $request, $id){
        $user = User::findOrFail($id);
        if(Auth::user()->id != $id){
            return abort(403, "Neovlašteno");
        }
        $user->name = $request->name;
        $user->save();
        return redirect()->back();
    }
}
