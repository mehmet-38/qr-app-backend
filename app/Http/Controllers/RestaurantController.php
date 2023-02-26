<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function getRestaurantData()
    {

        $products = Restaurant::query()->join("menus", "menus.id", "=", "restaurants.menus_id")->get();
        return json_encode($products);
    }
    public function getRestWithId($rest_id)
    {
        $resturant = Restaurant::query()->join("menus", "menus.id", "=", "restaurants.menus_id")
            ->where("restaurants.rest_id", "=", $rest_id)->get();
        return json_encode($resturant);
    }
    public function getRestTableCount($rest_id)
    {
        $rest_table_count = Restaurant::select("table_count")->where("rest_id", $rest_id)->first();
        return response()->json($rest_table_count);
    }

    public function addResturantData(Request $request)
    {
        $resturant = new Restaurant();
        $resturant->rest_name = $request->rest_name;
        $resturant->menus_id = $request->menus_id;
        $resturant->qr_link = $request->qr_link;
        $resturant->rest_photo = $request->file('file')->store('restPhoto');
        $resturant->save();
        return json_encode("success for saved restaurant");
    }
}
