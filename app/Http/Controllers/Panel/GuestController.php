<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function Index()
    {

        if (Auth::user()->role == env("ROLE_ADMIN")) {

            return redirect()->route("a-home");
        } else if (Auth::user()->role == env("ROLE_RESTAURANT_MANAGER")) {
            return redirect()->route("r-home");
        }
    }
}
