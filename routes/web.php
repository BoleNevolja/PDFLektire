<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("home");
})->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq')->middleware("auth");
Route::get('/cc', [App\Http\Controllers\HomeController::class, 'cc'])->name('cc')->middleware("auth");
Route::get('/search', [App\Http\Controllers\HomeController::class, 'find'])->name('find')->middleware("auth");
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact')->middleware("auth");
Route::get('/donate', [App\Http\Controllers\HomeController::class, 'donate'])->name('donate')->middleware("auth");
Route::get('/notifications', [App\Http\Controllers\HomeController::class, 'notifications'])->name('notifications')->middleware("auth");
Route::delete('/notification/delete', [App\Http\Controllers\HomeController::class, 'deletenot'])->name('notification.delete')->middleware("auth");


Route::get('/book/create', [App\Http\Controllers\BookController::class, 'create'])->name('addbook')->middleware("auth");
Route::post('/store/book', [App\Http\Controllers\BookController::class, 'store'])->name('storebook')->middleware("auth");
Route::get('/book/{id}', [App\Http\Controllers\BookController::class, 'index'])->name('book')->middleware("auth");
Route::get('/book/download/{id}', [App\Http\Controllers\BookController::class, 'download'])->name('download')->middleware("auth");
Route::get('/popular', [App\Http\Controllers\BookController::class, 'popular'])->name('popular')->middleware("auth");
Route::get('/new', [App\Http\Controllers\BookController::class, 'new'])->name('new')->middleware("auth");
Route::get('/textbook', [App\Http\Controllers\BookController::class, 'textbook'])->name('textbook')->middleware("auth");
Route::get('/our', [App\Http\Controllers\BookController::class, 'our'])->name('our')->middleware("auth");
Route::get('/publish', [App\Http\Controllers\BookController::class, 'publish'])->name('publish')->middleware("auth");
Route::post('/published', [App\Http\Controllers\BookController::class, 'published'])->name('published')->middleware("auth");
Route::post('/add/favorite', [App\Http\Controllers\BookController::class, 'like'])->name('like')->middleware("auth");
Route::delete('/remove/favorite', [App\Http\Controllers\BookController::class, 'unlike'])->name('unlike')->middleware("auth");

Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware("auth");
Route::get('/user/settings/{id}', [App\Http\Controllers\UserController::class, 'settings'])->name('settings')->middleware("auth");
Route::put('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edituser')->middleware("auth");
Route::put('/user/picture/{id}', [App\Http\Controllers\UserController::class, 'picture'])->name('picture')->middleware("auth");
Route::get('/summary', [App\Http\Controllers\UserController::class, 'downloadSummary'])->name('summary')->middleware("auth");
Route::get('/vip', [App\Http\Controllers\UserController::class, 'downloadPremium'])->name('premium')->middleware("auth");

Route::get('/status', [App\Http\Controllers\AdminController::class, 'status'])->name('status')->middleware("auth");
Route::get('/chat', [App\Http\Controllers\AdminController::class, 'chat'])->name('chat')->middleware("auth");
Route::post('/sent', [App\Http\Controllers\AdminController::class, 'sent'])->name('sent')->middleware("auth");
Route::post('/respond', [App\Http\Controllers\AdminController::class, 'respond'])->name('respond')->middleware("auth");
Route::get('/notification/reply/{id}', [App\Http\Controllers\AdminController::class, 'reply'])->name('notification')->middleware("auth");
Route::get('/notification/dwn/{id}', [App\Http\Controllers\AdminController::class, 'dwn'])->name('dwn')->middleware("auth");
Route::put('/status/accept', [App\Http\Controllers\AdminController::class, 'accept'])->name('accept')->middleware("auth");
Route::delete('/status/reject', [App\Http\Controllers\AdminController::class, 'reject'])->name('reject')->middleware("auth");
Route::delete('/remove/book', [App\Http\Controllers\AdminController::class, 'remove'])->name('remove')->middleware("auth");

Route::post('/addcomment', [App\Http\Controllers\CommentController::class, 'add'])->name('addcoment')->middleware("auth");
Route::post('/removecomment', [App\Http\Controllers\CommentController::class, 'remove'])->name('removecoment')->middleware("auth");