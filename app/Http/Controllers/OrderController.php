<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addOrder(Request $req)
    {
        $auth_user_id = Auth::user()->id;
        $order = new Order();
        $order->table_number = $req->table_number;
        $order->order_price = $req->order_price;
        $order->user_id = $auth_user_id;
        $order->rest_id = $req->rest_id;
        $result = $order->save();
        if ($result) {
            return response()->json(["order_id" => $order->id]);
        } else {
            return response()->json("wrong");
        }
    }
    public function deleteOrders()
    {
        $auth_user_id = Auth::user()->id;
        $order = Order::query()->where("user_id", "=", $auth_user_id)->get();
        return json_encode($order);
    }
    public function orderDetail(Request $req)
    {
        $order_detail = new OrderDetail();
        $order_detail->product_name = $req->product_name;
        $order_detail->order_id = $req->order_id;
        $order_detail->isPaid = $req->isPaid;
        $result = $order_detail->save();
        if ($result) {
            return response()->json("success");
        } else {
            return response()->json("wrong");
        }
        // $order_detail = OrderDetail::query()->join("orders", "orders.id", "=", "order_details.order_id")->get();

        // return json_encode($order_detail);
    }
    public function getOrder()
    {
        $auth_user_id = Auth::user()->id;
        try {
            $result = Order::query()->join("order_details", "order_details.order_id", "=", "orders.id")
                ->where("orders.user_id", "=", $auth_user_id)->get();
            return response()->json(["orders" => $result], 200);
        } catch (\Throwable $th) {
            return response()->json(["Error" => $th], 404);
        }
    }
    public function updateIsPaid(Request $req)
    {

        $id = $req->id;

        $response = OrderDetail::where("id", "=", $id)->update([
            'isPaid' => $req->isPaid,
        ]);

        if ($response) {
            return response()->json($response);
        } else {
            return response()->json("Error");
        }
    }
}
