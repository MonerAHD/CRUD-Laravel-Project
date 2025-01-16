<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('tags')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Fields
        $request->validate([
            'category'=> 'required | min:3',
            'title'=> 'required | min:3',
            'description'=> 'required | min:3',
            'image'=> 'required | image | mimes:jpeg,png,jpg,gif', // 'image.*' => to check each image individually
            'tags'=> 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        // Store the Image name and uplode date in the storage folder (storage/images)
        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->store('images', 'public');
            
        }

        $post =  Post::create([
            'category'=> $request->input('category'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'image'=> $imageName,
            'user_id'=> Auth::id(),
        ]);

        if (isset($post->tags)) {

            $post->tags()->attach($post->tags);
            
        }

        // dd($request);

        // Message to confirm Post creation
        session()->flash('success', 'Post Created Successfully');

        return redirect()->route('posts.index');

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
    public function edit($id)
    {
        $post = Post::with('tags')->findOrFail($id);

        $tags = Tag::all();

        $this->authorize('edit posts');

        return view('posts.edit', compact('post', 'tags'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate Fields
        $request->validate([
            'category'=> 'required | min:3',
            'title'=> 'required | min:3',
            'description'=> 'required | min:3',
            'image'=> 'required | image | mimes:jpeg,png,jpg,gif' 
        ]);

        // Store the Image name and uplode date in the storage folder (storage/images)
        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->store('images', 'public');
            
        }
        
        $post->update([
            'category'=> $request->input('category'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'image'=> $imageName,
        ]);


        if (isset($post->tags)) {

            $post->tags()->attach($post->tags);
            
        }

        // Message to confirm Post creation
        session()->flash('updated', 'Post Updated Successfully');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete posts');
        $post->delete();
        session()->flash('deleted', 'Post Deleted Successfully');
        return redirect()->route('posts.index');
    }
}
