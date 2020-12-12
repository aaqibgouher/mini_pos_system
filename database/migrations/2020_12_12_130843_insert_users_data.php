<?php

use App\Utils\Common;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("users")->insert([
            "first_name" => "Aaqib",
            "last_name" => "Gouher",
            "email" => "aaqibgouher@gmail.com",
            "password" => bcrypt("123456"),
            "created_at" => Common::get_time_and_date()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
