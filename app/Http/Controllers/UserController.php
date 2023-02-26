<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUserData(Request $request){

        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->surname = $request->surname;
        $user->role = $request->role;
        $user->password = \Illuminate\Support\Facades\Hash::make($request->password) ;
        $user->save();
        return json_encode("User data saved success");
    }
    public function getUserData(){
        $users = \App\Models\User::all();
    return json_encode($users);
    }

}
