<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;
use App\Pizza_Order;
use App\Pizza;

class OrderController extends Controller
{
    private function saveCustomer($request){
        $customer = new Customer;
        $customer->first_name  = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->last_name = $request->last_name;
        $customer->save();
        return $customer->customer_id;
    }

    private function unsetArray($array){
        unset(
            $array['first_name'],
            $array['last_name'],
            $array['date'],
            $array['hours'],
            $array['action'],
            $array['_token'],
            $array['phone']
        );
        return $array;
    }

    private function getDeliveryDate($hours){
        $hourMin = strtotime(date('Y-m-d H:i:s'));
        $delivery = date("Y-m-d H:i:s", strtotime('+'.$hours.' minutes',$hourMin));     
        return $delivery;
    }

    private function saveOrder($delivery, $customer_id){
        $order = new Order;
        $order->customer_id  = $customer_id ;
        $order->delivery_at = $delivery;
        $order->save();
        return $order->order_id;
   }
    
    public function make(Request $request){
        $request->validate([
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'hours' => 'required',
            'phone' => 'required|max:10',
        ]);
        
        if(empty($this->unsetArray($request->all()))){
            return redirect()->back();
        };

        $customer_last_id = $this->saveCustomer($request);
        $order_last_id = $this->saveOrder($this->getDeliveryDate($request->hours), $customer_last_id);
        $pizzas = $this->unsetArray($request->all());
        $total_price = 0;

        foreach($pizzas as $key => $value){
            $size_pizza = substr($key, 0, 1);
            $id_pizza = substr($key, 2);
            $find_pizza = Pizza::find($id_pizza);
            if($size_pizza === "l"){
                $total_price = $find_pizza->price_little + $total_price;
            }else{
                $total_price = $find_pizza->price_big + $total_price; 
            }
            $pizza_order = new Pizza_Order;
            $pizza_order->order_id = $order_last_id;
            $pizza_order->pizza_id = $id_pizza;
            $pizza_order->size = $size_pizza === "l" ? false : true;
            $pizza_order->save();
        }
        $update_order = Order::find($order_last_id);
        $update_order->total_price = $total_price;
        $update_order->save();
        return redirect("/details/{$order_last_id}");
        
    }

    public function show($id){
        $order = Order::find($id);

        $summary = [];
        foreach ($order->pizza as $value) {
            $pizza = Pizza::find($value->pizza_id);
            $size = $value->pivot->size;
            $containt = [];
            $containt['name']  = $pizza->name;
            if($size){
                $containt['price'] = $pizza->price_big;
                $containt['size'] = 40; 
            }else{
                $containt['price']  = $pizza->price_little;
                $containt['size'] = 31;             
            }
            array_push($summary, $containt);
            unset($containt);
        }
        return view('details', ["customer" => Customer::find($order->customer_id), "order" => $order, 'summary' => $summary ]);
    }
}
