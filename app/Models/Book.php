<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function usersWhoDownloaded()
    {
        return $this->belongsToMany(User::class, 'downloads', 'book_id', 'user_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
