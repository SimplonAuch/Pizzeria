<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $primaryKey = "pizza_id";
    
    public function product(){
        return $this->belongsToMany('App\Product', 'product_pizza', 'pizza_id', 'product_id');
    }

}
