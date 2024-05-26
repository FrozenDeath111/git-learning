<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function getUser()
    {
        $users = User::all();

        return response()->json([
            'users' => $users,
        ]);
    }
    public function update_user(Request $request)
    {
        $user = User::find($request->id);
        $user->role = $request->changed_to;

        $notification = new Notification();

        $notification->changer = $request->changer;
        $notification->prev = $request->prev;
        $notification->changed_to = $request->changed_to;

        try {
            $notification->save();
            $user->save();
            return response()->json([
                'status' => 'success',
                'msg' => 'Data Updated Successfully',
                'code' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'msg' => $th->getMessage(),
                'code' => 400,
            ]);
        }
    }
}
