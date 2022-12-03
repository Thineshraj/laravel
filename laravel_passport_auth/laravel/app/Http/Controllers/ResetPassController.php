<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\ResetPassRequest;

class ResetPassController extends Controller
{
    public function ResetPassword (ResetPassRequest $request) {
        $email = $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);

        $checkEmail = DB::table('password_resets')->where('email', $email)->first();
        $checkToken = DB::table('password_resets')->where('token', $token)->first();

        if(!$checkEmail) {
            return response([
                'message' => 'Email is invalid'
            ], 401);
        }
        if(!$checkToken) {
            return response([
                'message' => 'Pin is invalid'
            ], 401);
        }

        // update password
        DB::table('users')->where('email', $email)->update([
            'password' => $password
        ]);

        // delete the reset password token
        DB::table('password_resets')->where('email', $email)->delete();

        return response([
            'message' => 'Password updated successfully'
        ]);

    }
}
