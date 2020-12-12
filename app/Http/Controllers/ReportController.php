<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request){
        $data = [];
        $filter_start_date = "";
        $filter_end_date = "";
        // echo date("Y-m-d", strtotime("2020-01-01 +6 months"));die;
        $data["error"] = "";
        $db = Order::selectRaw("sum(total) total, count(*) count, sum(discount) discount, date(created_at) created_at")->orderBy("created_at", "desc");

        if($request->isMethod('post')){
            $filter_start_date = trim($request->input("start_date"));
            $filter_end_date = trim($request->input("end_date"));

            if($filter_start_date){
                $db->where("created_at", ">=", date("Y-m-d 00:00:00", strtotime($filter_start_date)));
            }

            if($filter_end_date){
                $db->where("created_at", "<=", date("Y-m-d 23:59:59", strtotime($filter_end_date)));
            }
        }
        $sales = $db->groupBy(DB::raw("date(created_at)"))->get();

        $data["sales"] = $sales;
        $data["filter_start_date"] = $filter_start_date;
        $data["filter_end_date"] = $filter_end_date;

        return view("report", $data);
    }
}
