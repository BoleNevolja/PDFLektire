<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Favorite;
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

        $favorites = $user->favorites()->whereHas('book')->get();
        $data = [
            "user" => $user,
            "downloads" => $downloads,
            "favorites" => $favorites,
        ];
        return view("user.index",$data);
    }

    public function settings($id){
        $user = User::findOrFail($id);
        if(Auth::user()->id != $id){
            return abort(403,"Neovlašteno");
        };
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
        if($request->s == "social"){
        $user->name = $request->name;
        $user->instagram = $request->insta;
        $user->facebook = $request->face;
        $user->save();
        }elseif($request->s == "priv"){
            $user->like_status = $request->like;
            $user->download_status = $request->download;
            $user->save();
        }
        return redirect()->back();
    }
}
