<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::where('status', 2)->get();
        $data = [
            'books' => $books,
        ];
        return view('home', $data);
    }

    public function faq(){
        return view("stative.faq");
    }

    public function find(){
        $search_text = $_GET['querry'];
    
        $books = Book::where('name', 'like', '%' . $search_text . '%')->orWhere('author', 'like', '%' . $search_text . '%')->get();
        $data = [
            'books' => $books,
        ];
    
        return view('home', $data);
    }

    public function cc(){
        return view("stative.cc");
    }

    public function contact(){
        return view("contact");
    }

    public function donate(){
        return view("donate");
    }
}
