<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class license extends Model
{
    use HasFactory;
    protected $table='licenses';
    protected $fillable=['panel_id','site','token','end_date', 'status' , 'paid', 'price' , 'product_id'];

    public function panel() {
        return $this->belongsTo('App\Models\panel', 'panel_id');
    }
    public function product() {
        return $this->belongsTo('App\Models\product', 'product_id');
    }
}
