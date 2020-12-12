<?php

use App\Utils\Common;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertProductsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('products')->insert([
            "product_name" => "Butter Paneer Masala",
            "price" => 150,
            "description" => "Paneer tikka masala is an Indian dish of marinated paneer cheese served in a spiced gravy. It is a vegetarian alternative to chicken tikka masala.",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Plane Roti",
            "price" => 15,
            "description" => "Roti is a round flatbread native to the Indian subcontinent made from stoneground wholemeal flour, traditionally known as gehu ka atta, and water that is combined into a dough.",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Cold Drink",
            "price" => 50,
            "description" => "A soft drink is a drink that usually contains carbonated water, a sweetener, and a natural or artificial flavoring. The sweetener may be a sugar, high-fructose corn syrup, fruit juice, a sugar substitute, or some combination of these.",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Chicken Curry",
            "price" => 250,
            "description" => "Chicken curry is a dish originating from the Indian subcontinent. It is common in the Indian subcontinent, Southeast Asia, and Great Britain, as well as in the Caribbean.",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Biryani",
            "price" => 450,
            "description" => "Biryani is a mixed rice dish with its origins among the Indian subcontinent. It is made with Indian spices, rice, and meat, or vegetables and sometimes, in addition, eggs and/or potatoes in certain regional varieties.",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Chicken Chilli",
            "price" => 280,
            "description" => "Chilli chicken is a popular Indo-Chinese dish of chicken of Hakka Chinese heritage. In India, this may include a variety of dry chicken preparations. Though mainly boneless chicken is used in this dish, some people also use bone-in chicken too",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Rice",
            "price" => 100,
            "description" => "Rice is the seed of the grass species Oryza glaberrima or Oryza sativa. As a cereal grain, it is the most widely consumed staple food for a large part of the world's human population, especially in Asia and Africa. ",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Egg Role",
            "price" => 150,
            "description" => "Egg rolls are a variety of deep-fried appetizers served in American Chinese restaurants. An egg roll is a cylindrical, savory roll with shredded cabbage, chopped pork, and other fillings inside a thickly-wrapped wheat flour skin, which is fried in hot oil.",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Pizza",
            "price" => 250,
            "description" => "Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients, which is then baked at a high temperature, traditionally in a wood-fired oven. A small pizza is sometimes called a pizzetta.",
            "status" => 1,
            "created_at" => Common::get_time_and_date()
        ]);

        DB::table('products')->insert([
            "product_name" => "Burger",
            "price" => 300,
            "description" => "A hamburger is a sandwich consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, grilled, smoked or flame broiled",
            "status" => 1,
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
