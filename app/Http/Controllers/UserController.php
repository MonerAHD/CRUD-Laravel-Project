<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $postCount = Post::where('user_id', $user->id)->count();
        $commentCount = Comment::where('user_id', $user->id)->count();
        return view('user.profile', compact('user', 'postCount', 'commentCount'));
    }

    public function edit(){
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }


    public function update(Request $request){
        $validate = $request->validate([
            'name' => 'required | string ',
            'email' => 'required | string |email | unique:users,email,' . Auth::id(),
            'password' => 'nullable | string | min:8',
            'user_image' => 'nullable | image | mimes:jpeg,jpg,png,gif',
        ]);


        $user = Auth::user(); // استرجاع المستخدم الحالي

        $user->name = $validate['name'];

        if ($request->hasFile('user_image')) {
            $imagePath = $request->file('user_image')->store('storage', 'public');
            $user->user_image = $imagePath;
        }

        if (!empty($validate['password'])) {
            $user->password = Hash::make($validate['password']); // تحديث كلمة المرور
        }

        $user->email = $validate['email'];

        $user->save();

        session()->flash('success', 'Profile Updated Successfully');        

        return redirect()->route('user.profile');



    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('logout', 'Logout Successfully');
        return redirect()->route('login');
    }
}
