<?php

namespace App\Http\Controllers;

use App\Utils\Auth;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $data[] = "";
        $data["error"] = "";
        $data["product_count"] = Product::get_all_product_count();
        $data["order_count"] = Order::where('created_at', "like", date("Y-m-d")."%")->count();
        $data["today_sales"] = +(Order::where('created_at', "like", date("Y-m-d")."%")->sum("total"));

        return view("dashboard", $data);
    }
}
