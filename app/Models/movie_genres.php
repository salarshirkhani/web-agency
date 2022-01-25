<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie_genres extends Model
{
    use HasFactory;

    protected $fillable=['genre_id', 'movie_id'];
    
    public function genre() {
        return $this->belongsTo('App\Models\genres', 'genre_id');
    }

    public function movie() {
        return $this->belongsTo('App\Models\series', 'movie_id');
    }
}
