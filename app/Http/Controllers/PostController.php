<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;
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
        $this->authorize('manageUser', User::class);
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
            'image.*'=> 'required | image | mimes:jpeg,png,jpg,gif' // 'image.*' => to check each image individually
        ]);

        $imagePaths = []; // Array to store the image paths

        // Store the Image name and uplode date in the storage folder (storage/images)
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName() . "-" . time();
                $path = $image->storeAs('images', $imageName, 'public');
                $imagePaths[] = $path;
            }
        }

        $imageNameJSON = json_encode($imagePaths); // to convert array to json and image path encryption.

        Post::create([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'image'=> $imageNameJSON
        ]);


        // Message to confirm Post creation
        session()->flash('success', 'Post Created Successfully');

        return redirect()->route('posts.index');

        // dd($imageNameJSON);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate Fields
        $request->validate([
            'title'=> 'required | min:3',
            'description'=> 'required | min:3', 
        ]);

        $imagePaths = []; // Array to store the image paths

        // Store the Image name and uplode date in the storage folder (storage/images)
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName() . "-" . time();
                $path = $image->storeAs('images', $imageName, 'public');
                $imagePaths[] = $path;
            }
        }else{
            $imagePaths = json_decode($post->image, true); // true : to convert json string to array
        }

        $imageNameJSON = json_encode($imagePaths); // to convert array to json and image path encryption.

        $post->update([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'image'=> $imageNameJSON
        ]);

        // Message to confirm Post creation
        session()->flash('updated', 'Post Updated Successfully');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('deleted', 'Post Deleted Successfully');
        return redirect()->route('posts.index');
    }
}
