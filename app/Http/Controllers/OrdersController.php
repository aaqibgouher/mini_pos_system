<?php
namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\Order;
use App\Utils\Common;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $data[] = "";
        $data["error"] = "";
        $data["orders"] = Order::orderBy('created_at', 'desc')->get();
        return view('order.index', $data);
    }

    public function add(Request $request){
        $subtotal = 0;
        $data[] = "";
        $data["error"] = "";
        $data["products"] = Product::all();
        $data["order_no"] = Order::get_order_no();

        if($request->isMethod('post')){
            try{

                $validator = Validator::make($request->all(), [
                    "items" => "required|array",
                    "quantity" => "required|array",
                    "quantity.*" => "numeric|min:1|max:1000"
                ]);

                if($validator->fails()){
                    throw new Exception($validator->errors()->first());
                }

                $items = $request->input('items');
                $quantities = $request->input('quantity');
                $discount = $request->input('discount');

                if($discount < 0 || $discount > 50) throw new Exception("Discount should be valid.");

                if(count($items) != count($quantities)) throw new Exception("Count should be equal.");

                $subtotal = Order::get_subtotal($items, $quantities);
                
                $total = Order::get_total($subtotal, $discount);

                $order_id = Order::insert_order_and_get_id($data["order_no"], $subtotal, $discount, $total);

                OrderProduct::insert_order_products($items, $quantities, $order_id);

                return redirect()->route('orders');

            }catch(Exception $e){
                $data['error'] = $e->getMessage();
            }
        }

        return view('order.add_order', $data);
    }

    public function edit(Request $request, $order_id){
        $subtotal = 0;
        $data = [];
        $data["error"] = "";
        $data["products"] = Product::all();
        $data['order'] = Order::where('id', $order_id)->first();
        $data['order_products'] = OrderProduct::where('order_id', $order_id)->get();

        if($request->isMethod('post')){
            try{

                $validator = Validator::make($request->all(), [
                    "items" => "required|array",
                    "quantity" => "required|array",
                    "quantity.*" => "numeric|min:1|max:1000"
                ]);

                if($validator->fails()){
                    throw new Exception($validator->errors()->first());
                }


                $items = $request->input('items');
                $quantities = $request->input('quantity');
                $discount = $request->input('discount');

                if($discount < 0 || $discount > 50) throw new Exception("Discount should be valid.");

                if(count($items) != count($quantities)) throw new Exception("Count should be equal.");

                $subtotal = Order::get_subtotal($items, $quantities);
                
                $total = Order::get_total($subtotal, $discount);

                Order::update_order($order_id, $data["order"]["order_no"], $subtotal, $discount, $total);

                OrderProduct::delete_existing_order_products_by_id($order_id);

                OrderProduct::update_order_products($items, $quantities, $order_id);

                return redirect()->route('orders');


            }catch(Exception $e){
                $data['error'] = $e->getMessage();
            }
        }

        return view('order.edit_order', $data);
    }

    public function view($order_id){
        $data = [];
        $data["error"] = "";
        $data["order"] = Order::find($order_id);
        $data["order_products"] = OrderProduct::where('order_id', $order_id)->get();

        return view("order.view_order", $data);
    }

    public function delete($order_id){
        Order::find($order_id)->delete();
        OrderProduct::where('order_id', $order_id)->delete();
        return redirect()->route('orders');
    }
}
