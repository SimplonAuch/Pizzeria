<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = "order_id";
    
    public function pizza(){
        return $this->belongsToMany('App\Pizza', 'pizza_order', 'order_id', 'pizza_id')->withPivot('size');
    }
}
