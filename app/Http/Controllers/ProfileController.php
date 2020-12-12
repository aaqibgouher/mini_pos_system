<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function about(){
        $data[] = "";
        $data['error'] = "";

        return view("profile", $data);
    }
}
