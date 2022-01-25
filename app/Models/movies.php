<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movies extends Model
{
    use HasFactory;
    protected $table='movies';
    protected $fillable=['title','description','slug','year', 'status' , 'link', 
    'trailer', 'duaration', 'downloadable', 'featured', 'image', 'stars', 'iframe'];

    public function genres() {
        return $this->hasMany('App\Models\movie_genres');
    }
}
