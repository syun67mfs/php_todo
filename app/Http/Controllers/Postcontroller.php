<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Postcontroller extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('created_at', 'desc')->get;
        // ↓簡潔な書き方
        $posts = Post::latest()->get();


        return view('index')
        ->with(['posts' => $posts]);
    }



    public function show(Post $post)
    {
        // implicit bindingを使う事で↓を書かずに簡潔に使える
        // $post = Post::findOrFail($id);

        return view('posts.show')
            ->with(['post' => $post]);
    }
}
