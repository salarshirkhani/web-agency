<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serie_genres extends Model
{
    use HasFactory;
    
    protected $fillable=['genre_id', 'serie_id'];
    
    public function genre() {
        return $this->belongsTo('App\Models\genres', 'genre_id');
    }

    public function serie() {
        return $this->belongsTo('App\Models\series', 'serie_id');
    }
}

