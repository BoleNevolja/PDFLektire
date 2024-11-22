<?php

namespace App\Http\Controllers;
use App\Models\Book;
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
        $book->file_size = $fileSize / 1024;
        $book->save();
        return view("book.create");
        
    }

    public function index($id){
        $book = Book::findOrFail($id);
        $data = [
            "book" => $book,
        ];
        return view("book.index", $data);
    }

    public function download($id){
        $book = Book::findOrFail($id);
        $path = $book->file_path;
        return response()->download(public_path($path));
        return redirect()->back();
    }

    public function popular(){
        return 0;
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
        return 0;
    }
}
