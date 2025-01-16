<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {

        $postCount = Post::count();
        $userCount = User::count();
        $commentCount = Comment::count();

        if(Auth::user()->role == 'admin'){

            return view('admin.index', compact('postCount', 'userCount', 'commentCount'));
    
        }else{
    
            return redirect()->route('posts.index')->with('error', 'You Are not Admin');
    
        }

    }


    public function allUsers(){
        
        $users = User::all();
        return view('admin.allUsers', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif',
            'role' => 'required | in:user,admin',
        ]);

        // dd($request->all());

        // تخزين صورة الملف الشخصي
        if ($request->hasFile('user_image')) {
            $imagePath = $request->file('user_image')->store('images', 'public');
        }

        // إنشاء المستخدم
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'user_image'=> $imagePath,
            'role'=>$validated['role'],
        ]);

        session()->flash('success', 'User Created Successfully');

        return redirect()->route('admin.allUsers');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.showUser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif',
            'role' => 'required ',
        ]);

        // تخزين صورة الملف الشخصي
        if ($request->hasFile('user_image')) {
            $imagePath = $request->file('user_image')->store('images', 'public');
        }

        $user = User::findOrFail($id);

        $user->update([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'user_image'=> $imagePath,
            'role'=>$validated['role'],            
        ]);

        session()->flash('Updated', 'User Updated Successfully');

        return redirect()->route('admin.allUsers');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('deleted', 'User Deleted Successfully');
        return redirect()->route('admin.allUsers');
    }


}
