<?php

namespace App\Models;

use App\Utils\Common;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "order_product";

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function insert_order_products_and_created_at($order_id, $value, $quantity, $amount){
        OrderProduct::insert([
            "order_id" => $order_id,
            "product_id" => $value,
            "quantity" => $quantity,
            "amount" => $amount,
            "created_at" => Common::get_time_and_date()
        ]);
    }

    public static function update_order_products_and_updated_at($order_id, $value, $quantity, $amount){
        OrderProduct::insert([
            "order_id" => $order_id,
            "product_id" => $value,
            "quantity" => $quantity,
            "amount" => $amount,
            "updated_at" => Common::get_time_and_date()
        ]);
    }

    public static function insert_order_products($items, $quantities, $order_id){
        foreach($items as $key=>$value){
            $item_id = $value;
            $item = Product::where('id',$item_id)->first();
            $price = $item->price;
            $amount = +($quantities[$key]) * $price;

            OrderProduct::insert_order_products_and_created_at($order_id, $value, +($quantities[$key]), $amount);
            // OrderProduct::insert([
            //     "order_id" => $order_id,
            //     "product_id" => $value,
            //     "quantity" => $quantities[$key],
            //     "amount" => $amount,
            //     "created_at" => Common::get_time_and_date()
            // ]); 
        }
    }

    public static function update_order_products($items, $quantities, $order_id){
        foreach($items as $key=>$value){
            $item_id = $value;
            $item = Product::where('id',$item_id)->first();
            $price = $item->price;
            $amount = +($quantities[$key]) * $price;

            OrderProduct::update_order_products_and_updated_at($order_id, $value, +($quantities[$key]), $amount);
            // OrderProduct::insert([
            //     "order_id" => $order_id,
            //     "product_id" => $value,
            //     "quantity" => $quantities[$key],
            //     "amount" => $amount,
            //     "created_at" => Common::get_time_and_date()
            // ]); 
        }
    }

    public static function delete_existing_order_products_by_id($order_id){
        OrderProduct::where('order_id', $order_id)->delete();
    }
}
