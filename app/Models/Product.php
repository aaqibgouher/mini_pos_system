<?php

namespace App\Models;

use App\Models\Order;
use App\Utils\Common;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function order(){
        return $this->hasMany(Order::class);
    }

    public static function get_all_product_count(){
        return Product::all()->count();
    }

    public static function insert_product($product_name, $price, $description, $status){
        Product::insert([
            "product_name" => $product_name,
            "price" => $price,
            "description" => $description,
            "status" => $status ? 1 : 0,
            "created_at" => Common::get_time_and_date()
        ]);
    }

    public static function edit_product($product_id, $product_name, $description, $price,  $status){
        Product::where('id', $product_id)->update([
            "product_name" => $product_name,
            "price" => $price,
            "description" => $description,
            "status" => $status ? 1 : 0,
            "updated_at" => Common::get_time_and_date()
        ]);
    }
}
