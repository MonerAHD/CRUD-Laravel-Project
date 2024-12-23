<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm () {
        return view('auth.login');
    }

    public function login (Request $request) {
        
        // $request->validate([
        //     'email' => 'required | email | unique',
        //     'password' => 'required | min:6 | confirmed'
        // ]);

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            
            $request->session()->regenerate();

            session()->flash('success', 'Login Successfully');

            return redirect()->route('posts.index');

        }

        return back()->withErrors(["message" => "Invalid Email or Password"]);
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('logout', 'Logout Successfully');
        return redirect()->route('login');
    }
}
