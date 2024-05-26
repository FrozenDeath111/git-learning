<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function login(Request $request)
    {
        try{
            $user = User :: where('name',$request['username'])->firstOrFail();
            if($user->password == $request['password']){
                return response()->json(["message" => "Login Succesfull!","role" => $user->role],200);
            }else{
                return response()->json(["message" => "Password didn't matched!"],500);
            }
        }catch (\Exception $e) {
            return  response()->json(["Error" => $e->getMessage()]);
        }
    }

    public function register(Request $request)
    {
        return $request;
    }
}
