<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

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

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.index');
    }

    public function edit(Post $post)
    {
        // implicit bindingを使う事で↓を書かずに簡潔に使える
        // $post = Post::findOrFail($id);

        return view('posts.edit')
            ->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('posts.index');
    }

}
