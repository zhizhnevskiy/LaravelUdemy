<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('admin.body.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'currentPassword' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->currentPassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            return Redirect()->route('login')->with('success', 'Password is changed Successfully');
        } else {
            return Redirect()->back()->with('success', 'Current Password is invalid');
        }
    }

    public function updateProfile(){
        if(Auth::user()){
            $user = User::find(Auth::id());
            if($user){
                return view('admin.body.updateProfile', compact('user'));
            }
        }
    }

    public function changeProfile(Request $request){
        $user = User::find(Auth::id());
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return Redirect()->back()->with('success', 'User Profile updated successfully');
        } else{
            return Redirect()->back();
        }
    }
}
