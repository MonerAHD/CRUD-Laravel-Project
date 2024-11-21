<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Fields
        $request->validate([
            'title'=> 'required | min:3',
            'description'=> 'required | min:3',
            'image'=> 'required | image | mimes:jpeg,png,jpg,gif' 
        ]);
        // Store the Image name and uplode date in the storage folder (storage/images)
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName() . "-" . time() . $request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('storage/images'), $imageName);
        }

        Post::create([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'image'=> $imageName
        ]);

        // Message to confirm Post creation
        session()->flash('success', 'Post Created Successfully');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Just go to the show page 
        return view('posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Just go to the edit page
        return view('posts.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
