<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function getCouponWithUserId()
    {
        $auth_user_id = Auth::user()->id;

        $coupon = Coupon::query()->where("user_id", "=", $auth_user_id)->get();
        return response()->json($coupon);
    }
}
