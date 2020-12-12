<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Utils\Common;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $data[] = "";
        $data["error"] = "";

        $data['products'] = Product::all();

        return view('product.products', $data);
    }

    public function add(Request $request){
        $data[] = "";
        $data['error'] = "";

        if($request->isMethod('post')){
            try{
                $validator = Validator::make($request->all(),[  
                    "product_name" => "required|max:100",
                    "description" => "required|max:500",
                    "price" => "required"
                ]);

                if($validator->fails()){
                    throw new Exception($validator->error()->first());
                }

                $product_name = $request->input('product_name');
                $description = $request->input('description');
                $price = $request->input('price');
                $status = $request->input('status');
                
                $product = Product::where('product_name', $product_name)->first();

                if($product) throw new Exception("The Product Name already exists ...");

                Product::insert_product($product_name, $price, $description, $status);

                return redirect()->route('products');

            }catch(Exception $e){
                $data['error'] = $e->getMessage();
            }
        }

        return view('product.add_product', $data);
    }

    public function edit(Request $request, $product_id){
        $data[] = "";
        $data["error"] = "";

        $data["product"] = Product::where('id', $product_id)->first();
        // dd($product);

        if($request->isMethod("post")){
            try{
                // dd($request->all());
                $validator = Validator::make($request->all(), [
                    "product_name" => "required|max:100",
                    "description" => "required|max:500",
                    "price" => "required"
                ]);

                if($validator->fails()){
                    throw new Exception($validator->error()->first());
                }

                $product_name = $request->input("product_name");
                $description = $request->input("description");
                $price = $request->input("price");
                $status = $request->input("status");

                Product::edit_product($product_id, $product_name, $description, $price, $status);

                return redirect()->route('products');

            }catch(Exception $e){
                $data['error'] = $e->getMessage();
            }
        }

        return view('product.edit_product', $data);

    }

    public function view($product_id){
        $data[] = "";
        $data['error'] = "";
        $data['product'] = Product::where('id', $product_id)->first();
        
        return view('product.view_product', $data);
    }

    public function delete($product_id){
        Product::find($product_id)->delete();
        return redirect()->route('products');
    }
}
