<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm () {
        return view('auth.login');
    }
    public function registerForm () {
        return view('auth.register');
    }

    public function login (Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|'
        ]);

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {

            if (Auth::user()->user_type == 'admin') {

                $request->session()->regenerate();
    
                session()->flash('success', 'Login Successfully');
    
                return redirect()->route('admin.index');
                
            }else{

                $request->session()->regenerate();

                session()->flash('success', 'Login Successfully');

                return redirect()->route('posts.index');

            }

        }

        return back()->withErrors(["message" => "Invalid Email or Password"]);
    }


    public function register (Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
        ]);

        if (Auth::attempt(['name'=>$request->name ,'email'=>$request->email, 'password'=>$request->password])) {
            
            $request->session()->regenerate();

            session()->flash('success', 'Account Created Successfully');

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
