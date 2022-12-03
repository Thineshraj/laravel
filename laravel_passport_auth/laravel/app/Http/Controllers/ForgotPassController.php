<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\ForgotPassRequest;
use Mail;
use App\Mail\ForgotPassMail;

class ForgotPassController extends Controller
{
    public function ForgotPassword (ForgotPassRequest $request) {
        $email = $request->email;

        if(User::where('email', $email)->doesntExist()) {
            return response([
                'message' => 'Invalid email'
            ], 401);
        }

        // generate random token
        $token = rand(10, 1000000);

        try {
            // insert the data
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);

            // mail send to user
            Mail::to($email)->send(new ForgotPassMail($token));

            return response([
                'message' => 'Reset password link has sent to your email'
            ], 200);

        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }
}
