<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function register(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->password = $request->password;
        $user->role = $request->role;

        try {
            $user->save();
            return response()->json([
                'status' => 'success',
                'msg' => 'Data Entry Successful',
                'code' => 200,
            ]);
        } catch (\Throwable $th) {

            $user->save();
            return response()->json([
                'status' => 'error',
                'msg' => $th->getMessage(),
                'code' => 400,
            ]);
        }
    }
}
