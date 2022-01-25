<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panel extends Model
{
    use HasFactory;
    protected $table='panels';
    protected $fillable=['user_id','panel_id','site','name','email','phone', 'status' , 'percent'];

    public function panel() {
        return $this->hasOne('App\Models\panel');
    }
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function license() {
        return $this->hasMany('App\Models\license');
    }
}
