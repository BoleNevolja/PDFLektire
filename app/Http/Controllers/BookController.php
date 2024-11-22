<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(){
        if(Auth::user()->role != 2){
            return abort(403,"Neovlašteno");
        }else{
        return view("book.create");
        }
    }

    public function store(Request $request){
        $name = $request->short;
        $t = $request->test;
        $n = $request->textbook;
        $file = $request->file("book");
        $fileSize = $file->getSize();
        $newBookName = $name . rand(1000,10000) . ".pdf";
        $newThumbnailName = $name . rand(1000,10000) . ".png";
        $request->validate([
            'book' => ['mimes:pdf'],
            'thumbnail' => ['mimes:png'],
        ]);
        $request->book->move(public_path("books/pdf"), $newBookName);
        $request->thumbnail->move(public_path("books/thumbnail"), $newThumbnailName);
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        if($t != 1){
            $book->user_id = Auth::user()->id;
        }
        $book->desc = $request->desc;
        if($t != 1 OR $n != 1){
            $book->textbook = 1;
        }else{
            $book->textbook = 2;
        }
        $book->file_path = "/books/pdf/" . $newBookName;
        $book->thumbnail = "/books/thumbnail/" . $newThumbnailName;
        $book->file_size = round($fileSize / 1024);
        $book->save();
        return view("book.create");
        
    }

    public function index($id){
        $book = Book::findOrFail($id);
        $downloads = Download::where('book_id', $id)
                          ->with('user') 
                          ->latest()      
                          ->get();
        $data = [
            "book" => $book,
            "downloads" => $downloads,
        ];
        return view("book.index", $data);
    }

    public function download($id){
        $book = Book::findOrFail($id);
        $user = Auth::user();
        Download::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);
        $path = $book->file_path;
        return response()->download(public_path($path));
        return redirect()->back();
    }

    public function popular(){
        $sevenDaysAgo = Carbon::now()->subDays(7);

        $books = Download::selectRaw('book_id, COUNT(*) as downloads_count')
        ->where('created_at', '>=', $sevenDaysAgo)
        ->groupBy('book_id')
        ->orderByDesc('downloads_count') 
        ->limit(10) 
        ->with('book') 
        ->get();
        $data = [
            "books" => $books,
        ];
        return view("popular",$data);
    }

    public function new(){
        $books = Book::orderBy("created_at", "desc")->get();
        $data = [
            "books" => $books,
        ];
        return view("home", $data);
    }

    public function textbook(){
        $books = Book::where('textbook', 2)->get();
        $data = [
            "books" => $books,
        ];
        return view("home", $data);
    }

    public function our(){
        $books = Book::whereNotNull('user_id')
             ->where('status', 2)
             ->get();
             $data = [
                "books" => $books,
             ];
             return view("home", $data);
    }

    public function publish(){
        return view("book.publish");
    }

    public function published(Request $request){
        $file = $request->file("book");
        $fileSize = $file->getSize();
        $newBookName = Auth::user()->id . "-" . rand(1000,10000) . ".pdf";
        $newThumbnailName = Auth::user()->id . "-" . rand(1000,10000) . ".png";
        $request->validate([
            'book' => ['mimes:pdf'],
            'thumbnail' => ['mimes:png'],
        ]);
        $request->book->move(public_path("books/pdf"), $newBookName);
        $request->thumbnail->move(public_path("books/thumbnail"), $newThumbnailName);
        $book = new Book;
        $book->name = $request->name;
        $book->author = Auth::user()->name;
        $book->user_id = Auth::user()->id;
        $book->desc = $request->desc;
        $book->textbook = 1;
        $book->status = 1;
        $book->file_path = "/books/pdf/" . $newBookName;
        $book->thumbnail = "/books/thumbnail/" . $newThumbnailName;
        $book->file_size = round($fileSize / 1024);
        $book->save();
        $newBook = Book::find($book->id);
        $data = [
            "newBook" => $newBook,
        ];
        return view("book.status",$data);
    }
}
