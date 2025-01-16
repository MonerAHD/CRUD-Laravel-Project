<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use GuzzleHttp\Exception\TooManyRedirectsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class CommentController extends Controller
{

    public function show($postId){
        $post = Post::with('comments.user')->findOrFail($postId);
        return view('posts.comments', compact('post'));
    }


    public function store(Request $request){
        $validate = $request->validate([
            'post_id' => 'required | exists:posts,id',
            'content' => 'required | string',
        ]);

        Comment::create([
            'post_id' => $validate['post_id'],
            'user_id' => Auth::id(),
            'content' => $validate['content']
        ]);

        session()->flash('updated', 'Comment Added Successfully');

        return redirect()->back();

    }

    public function edit($id){
        $comment = Comment::findOrFail($id);
        return view('posts.editComment', compact('comment'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'content' => 'required | string',
        ]);

        $comment = Comment::findOrFail($id);

        $comment->update($validate);

        session()->flash('updated', 'Comment Updated Successfully');

        return redirect()->route('posts.comments', $comment->post_id);

    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        session()->flash('deleted', 'Comment Deleted Successfully');        

        return redirect()->back();
    }


}
