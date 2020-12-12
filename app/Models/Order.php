<?php

namespace App\Models;

use App\Models\Order;
use App\Utils\Common;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product(){
        return $this->hasMany(Product::class);
    }

    public static function get_order_no(){
        $id = count(Order::all()) + 1;
        return "OR-".date("Y-m-d")."-".$id;
    }

    public static function get_subtotal($items, $quantities){
        $subtotal = 0;
        foreach($items as $key=>$value){
            $item_id = $value;
            $item_qty = $quantities[$key];
            $item = Product::where('id',$item_id)->first();
            $price = $item->price;
            $amount = $price * $item_qty;
            $subtotal += $amount;
        }   

        return $subtotal;
    }

    public static function get_total($subtotal, $discount){
        return $subtotal - $discount;
    }

    public static function insert_order_and_get_id($order_no, $subtotal, $discount, $total){
        $order_id = Order::insertGetId([
            "order_no" => $order_no,
            "subtotal" => $subtotal,
            "discount" => $discount,
            "total" => $total,
            "created_at" => Common::get_time_and_date()
        ]);

        return $order_id;
    }

    public static function update_order($order_id, $order_no, $subtotal, $discount, $total){

        Order::where('id', $order_id)->update([
            "order_no" => $order_no,
            "subtotal" => $subtotal,
            "discount" => $discount,
            "total" => $total,
            "updated_at" => Common::get_time_and_date()
        ]);
    }
}


