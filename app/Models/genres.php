<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    use HasFactory;
    protected $fillable=['title', 'slug','image'];

    public function movie_genres() {
        return $this->hasMany('App\Models\movie_genres');
    }

    public function serie_genres() {
        return $this->hasMany('App\Models\serie_genres');
    }
}
