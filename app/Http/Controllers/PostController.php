<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // User::factory()->count(10)->create();
        // $posts = Post::all();
        // $posts = Post::paginate(3);
        $posts = Post::with('user')->paginate(3);

        return view('posts.index')->with(['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create',['users'=> User::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storePostRequest $request)
    {
        Post::create($request->validated());
        return redirect()->route('posts.index');
        // dd('created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        return view('posts.show')->with(['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        return view('posts.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Post::where('id', $id)->update($request->only(['title', 'body']));
        return redirect()->route('posts.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id',$id)->delete();
        return redirect('/posts');
    }

    public function getTrashed(){
        $TrashedPosts= Post::onlyTrashed()->get();
        return view('posts.trash',['posts'=>$TrashedPosts]);
    }
}
