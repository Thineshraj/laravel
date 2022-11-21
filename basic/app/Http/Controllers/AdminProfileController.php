<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class AdminProfileController extends Controller
{
    public function ChangePassword () {
        return view('admin.body.changePassword');
    }

    public function UpdatePassword (Request $request) {
        $validateData = $request->validate([
            "oldPassword" => "required",
            "new_password" => "required_with:password_confirmation|same:password_confirmation",
            "password_confirmation" => "required",
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($request->oldPassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();

            return Redirect()->route('login');
        } else {
            return Redirect()->back()->with('error', 'Current Password is Invalid');
        };

    }

    public function AdminProfile () {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user) {
                return view('admin.body.admin_profile', compact('user'));
            }
        }
    }

    public function AdminProfileUpdate (Request $request) {
        $user = User::find(Auth::id());

        $user->update([
            "name" => $request->name,
            "email" => $request->email
        ]);

        return Redirect()->route('dashboard');
    }
}
