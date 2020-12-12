<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\User;
use App\Utils\Common;
use App\Models\UserToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

    public function login(Request $request){
        $data = [];
        $data["error"] = "";

        if($request->isMethod("post")){
            try{
                $request->flash();
                
                $validator = Validator::make($request->all(),[
                    "email" => "required|email",
                    "password" => "required"
                ]);

                // dd($validator);

                if($validator->fails()){
                    throw new Exception($validator->error()->first());
                }

                $email = trim($request->input("email"));
                $password = trim($request->input("password"));

                $user = User::where("email", $email)->first();
                if(!$user) throw new Exception("Email does not exist.");
                if(!Hash::check($password, $user->password)) throw new Exception("Correct Email and Password is reqired.");

                $user_id = $user->id;
                $token = Common::generate_token();

                session()->flush();
                session()->put('token', $token);

                UserToken::insert([
                    "user_id" => $user_id,
                    "token" => $token,
                    "created_at" => now() 
                ]);

                return redirect()->route("dashboard");

            }catch(Exception $e){
                $data["error"] = $e->getMessage();
            }
        }

        return view("auth.login",$data);
    }

    public function register(Request $request){
        $data[] = "";
        $data["error"] = "";

        if($request->isMethod("post")){
            try{
                $request->flash();

                $validator = Validator::make($request->all(),[
                    "first_name" => "required|max:100",
                    "last_name" => "required|max:100",
                    "email" => "required|email|max:100",
                    "password" => "required"
                ]);

                if($validator->fails()){
                    throw new Exception($validator->error()->first());
                }

                $first_name = $request->input("first_name");
                $last_name = $request->input("last_name");
                $email = $request->input("email");
                $password = $request->input("password");

                $user = User::where('email',$email)->first();
                
                if($user) throw new Exception("Email has already taken !");

                // echo json_encode($user);die;
                $user = new User();
                $user->first_name = $first_name;
                $user->last_name = $last_name;
                $user->email = $email;
                $user->password = bcrypt($password);
                $user->created_at = now();
                $user->save();

                $user_id = $user->id;
                $token = Common::generate_token();

                session()->flush();
                session()->put("token", $token);

                UserToken::insert([
                    "user_id" => $user_id,
                    "token" => $token,
                    "created_at" => now()
                ]);

                DB::commit();

                return redirect()->route("dashboard");

            }catch(Exception $e){
                DB::rollBack();
                $data["error"] = $e->getMessage();
            }
        }

        return view("auth.register",$data);
    }

    public function logout(){
        session()->flush();
        return redirect()->route("home");
    }
}
