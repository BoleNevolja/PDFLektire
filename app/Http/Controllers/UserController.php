<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        $downloads = Download::where('user_id', $id)
                          ->with('book') 
                          ->latest()      
                          ->get();
        $books = Book::where('user_id', $id)
                          ->with('book') 
                          ->latest()      
                          ->get();

        $favorites = $user->favorites()->whereHas('book')->get();
        $data = [
            "user" => $user,
            "books" => $books,
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
        $books = Book::where('user_id', $id)->get();

        $downloads = Download::whereHas('book', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        $latestDownload = Download::whereHas('book', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->latest()->first();

        $data = [
            "user" => $user,
            "books" => $books,
            "downloads" => $downloads,
            "latestDownload" => $latestDownload,
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

    public function picture(Request $request){
        $request->validate([
            'image' => ['mimes:jpeg,png,jpg'],
        ]);
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        if($user->image_path != "profile.png"){
            unlink("profile/" . $user->image_path);
        }
        $imageName = $id . "-" . rand(100,999) . "." . $request->image->extension();
        $request->image->move(public_path("profile"), $imageName);
        $user->image_path = $imageName;
        $user->save();
        return redirect()->back();
    }

    public function downloadSummary(){
        $user = Auth::user();
        $data = [
            "user" => $user,
        ];
        $pdf = Pdf::loadView('pdf.certificate', $data);
        return $pdf->download('izvještaj.pdf');
    }

    public function downloadPremium(){
        $user = Auth::user();
        $data = [
            "user" => $user,
        ];
        $pdf = Pdf::loadView('pdf.premium', $data);
        return $pdf->download('premium.pdf');
    }
}
