<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function home()
    {
        // Get order details with restaurant
        $order_details['order_details'] = OrderDetail::query()->join("orders", "orders.id", "=", "order_details.order_id")
            ->where("orders.rest_id", "=", Auth::user()->rest_id)->get();

        $total_price['total_price'] = OrderDetail::query()->join("orders", "orders.id", "=", "order_details.order_id")
            ->where("orders.rest_id", "=", Auth::user()->rest_id)->sum("orders.order_price");

        $data['title'] = "Manager";
        $data['content'] = view("users.rest_manager.dashboard", $order_details, $total_price);
        $data['sidebar'] = view("users.rest_manager.side_bar");
        return view("users.rest_manager", $data);
    }
    public function infoRestPage()
    {

        $restaurant['restaurant'] = Restaurant::query()->join("users", "users.rest_id", "=", "restaurants.rest_id")
            ->where("users.id", "=", Auth::user()->id)->get();


        $data['title'] = "Manager";
        $data['content'] = view('users.rest_manager.info_rest', $restaurant);
        $data['sidebar'] = view("users.rest_manager.side_bar");


        return view("users.rest_manager", $data);
    }
    public function addCouponPage()
    {
        $users['users'] = User::all();

        $data['title'] = "Manager";
        $data['content'] = view('users.rest_manager.add_coupon', $users);
        $data['sidebar'] = view("users.rest_manager.side_bar");

        return view("users.rest_manager", $data);
    }
    public function addCoupon(Request $req)
    {
        $restaurant = Restaurant::query()->join("users", "users.rest_id", "=", "restaurants.rest_id")
            ->where("users.id", "=", Auth::user()->id)->first();
        $user_id = User::select("id")->where("name", "=", $req->input('users'))->first();

        $coupon = new Coupon();
        $coupon->user_id = $user_id->id;
        $coupon->rest_id = $restaurant->rest_id;
        $coupon->active = $req->input('active');
        $coupon->coupon_code = $req->input('coupon_code');
        $result =  $coupon->save();
        if ($result)
            return redirect()->route("add-coupon-page");
        else
            echo "wrong";

        return response()->json($user_id);
    }
    public function updateRest(Request $request)
    {
        $rest_id = $request->input('rest_id');



        $response = Restaurant::where("rest_id", "=", $rest_id)->update([
            'rest_name' => $request->input('rest_name'),
            'qr_link' => $request->input('rest_qr'),
            'menus_id' => $request->input('menu_id'),
            //'rest_photo' => $request->file('rest_photo')->store('restPhoto')
        ]);
        if ($response) {
            return redirect()->route('info-rest');
        } else {
            echo "wrong";
        }
    }
    public function addMenuPage()
    {
        $menu['menu'] = User::query()->join("restaurants", "restaurants.rest_id", "=", "users.rest_id")
            ->join("menus", "menus.id", "=", "restaurants.menus_id")
            ->where("users.id", "=", Auth::user()->id)->get();

        $products['products'] = Restaurant::query()->join("menus", "menus.id", "=", "restaurants.menus_id")
            ->join("products", "products.menus_id", "=", "menus.id")
            ->where("restaurants.rest_id", "=", Auth::user()->rest_id)->get();

        $data['title'] = "Menü";
        $data['content'] = view("users.rest_manager.add_menu", $menu, $products);
        $data['sidebar'] = view("users.rest_manager.side_bar");
        return view("users.rest_manager", $data);
        //return response()->json($products);
    }
    public function addProductPage()
    {

        $data['title'] = "Product";
        $data['content'] = view("users.rest_manager.add_product");
        $data['sidebar'] = view("users.rest_manager.side_bar");
        return view("users.rest_manager", $data);
    }
    public function addProduct(Request $req)
    {
        $product = new Product();
        $product->food_name = $req->input('food_name');
        $product->food_price = $req->input('food_price');
        $product->menus_id = $req->input('menus_id');
        $product->product_photo = $req->file('product_photo')->store("productPhoto");
        $response = $product->save();
        if ($response)
            return redirect()->route("add-product-page");
        else
            echo "wrong";
    }
}
