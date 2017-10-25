<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class HomeController extends Controller
{
    public function show() {
        $pizzas = Pizza::all();
        $menu = [];
        foreach($pizzas as $value){
            $unique_pizza = Pizza::find($value->pizza_id);
            $single = [];
            foreach($unique_pizza->product as $product){
               array_push($single, $product);
            }
            array_push($menu, [
                'name' =>  $unique_pizza->name,
                'price_little' => $unique_pizza->price_little,
                'price_big' => $unique_pizza->price_big,
                'pizza_id' => $unique_pizza->pizza_id,
                'compose' => $single,
                'status' => $unique_pizza->status
            ]);
            unset($single);
        }
        
        return view('home', ['menu' => $menu, 'error_message' => '']);
    }
}
