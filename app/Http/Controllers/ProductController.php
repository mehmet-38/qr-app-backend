<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProductsData(Request $request){
        $product = new Product();
        $product->food_name = $request->food_name;
        $product->food_price = $request->food_price;
        $product->menus_id = $request->menus_id;
        $product->product_photo = $request->file('file')->store('productPhoto');
        $result = $product->save();
        if($result)
        return json_encode("success for saved products");
        else
        json_encode("failed for saved products");
    }
}
