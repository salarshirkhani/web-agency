<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class series extends Model
{
    use HasFactory;
    protected $table='series';
    protected $fillable=['title','description','slug','year', 'status' , 'link', 
    'trailer', 'featured', 'image', 'stars', 'iframe'];

    public function episode() {
        return $this->hasMany('App\Models\episode');
    }

    public function genres() {
        return $this->hasMany('App\Models\serie_genres');
    }

}
