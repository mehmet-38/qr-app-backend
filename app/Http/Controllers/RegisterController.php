<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Register(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname'=>['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->surname=$request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();

        if($result)
        return json_encode("Success for register");
        else
        return json_encode("Failed for registered");

    }
}
