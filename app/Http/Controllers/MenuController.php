<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function getMenusData($menus_id){
        $menu = Menu::query()->join("products","products.menus_id","=","menus.id")
        ->where("menus_id","=",$menus_id)
        ->get();
        return json_encode($menu);
    }
    public function addMenusData(Request $request){
        $menu = new Menu();
        $menu->menu_name = $request->menu_name;
        $result = $menu->save();

        if($result)
        return json_encode("success for saved menus");
        else
        return json_encode("failed for saved menus");
    }
}
