<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episode extends Model
{
    use HasFactory;
    protected $table='episodes';
    protected $fillable=['serie_id', 'title','description','slug', 'status' , 'link', 
     'duaration', 'downloadable', 'image', 'iframe'];

     public function for() {
        return $this->belongsTo('App\Models\series', 'serie_id');
    }
}
