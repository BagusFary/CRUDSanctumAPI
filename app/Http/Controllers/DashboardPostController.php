<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.posts.index', [
            'posts' => Post::all(),
            'users' => User::all(),
            'posts' => Post::latest()->filter()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'users' => User::all()
        ]);
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'judul' => 'required|max:20',
            'deskripsi' => 'required|max:255'
        ]);
        
        // $validatedData['user_id'] = auth()->user()->id;
        
        Post::create($validatedData);
    
        return redirect('/dashboard/posts')->with('success', 'New post has been added');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'users' => User::all(),
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'users' => User::all()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'user_id' => 'required',
            'judul' => 'required|max:255',
            'deskripsi' => 'required|max:255'
            
        ];

     

        $validatedData = $request->validate($rules);

        Post::where('id', $post->id)
            ->update($validatedData);
    
        return redirect('/dashboard/posts')->with('success', 'post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
    
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }
}
