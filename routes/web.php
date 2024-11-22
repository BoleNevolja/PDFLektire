<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq')->middleware("auth");
Route::get('/cc', [App\Http\Controllers\HomeController::class, 'cc'])->name('cc')->middleware("auth");
Route::get('/search', [App\Http\Controllers\HomeController::class, 'find'])->name('find')->middleware("auth");

Route::get('/book/create', [App\Http\Controllers\BookController::class, 'create'])->name('addbook')->middleware("auth");
Route::post('/store/book', [App\Http\Controllers\BookController::class, 'store'])->name('storebook')->middleware("auth");
Route::get('/book/{id}', [App\Http\Controllers\BookController::class, 'index'])->name('book')->middleware("auth");
Route::get('/book/download/{id}', [App\Http\Controllers\BookController::class, 'download'])->name('download')->middleware("auth");
Route::get('/popular', [App\Http\Controllers\BookController::class, 'popular'])->name('popular')->middleware("auth");
Route::get('/new', [App\Http\Controllers\BookController::class, 'new'])->name('new')->middleware("auth");
Route::get('/textbook', [App\Http\Controllers\BookController::class, 'textbook'])->name('textbook')->middleware("auth");
Route::get('/our', [App\Http\Controllers\BookController::class, 'our'])->name('our')->middleware("auth");

Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware("auth");