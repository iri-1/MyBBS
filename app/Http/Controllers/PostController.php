<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderby('created_at', 'desc')->get();
        $posts = Post::latest()->get();
        return view('index')
            ->with(['posts' => $posts]);
    }

    // こちらはクリックしてから表示されるページに毎回のposts[$id]を渡す
    // public  function show($id)
    //Implicit Binding
    public function show(Post $post)
    {
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

    // 削除
    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()
            ->route('posts.index');
    }
}
