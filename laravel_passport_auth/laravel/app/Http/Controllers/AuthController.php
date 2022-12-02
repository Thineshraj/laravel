<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login (Request $request) {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => 'Successfully Login',
                    'token' => $token,
                    'user' => $user
                ], 200);
            }

        } catch (Exeption $exeption) {
            return response([
                'message' => $exeption->getMessage()
            ], 400);
        }

        return response([
            'message' => 'Invalid Email or Password'
        ], 401);
    }
}
