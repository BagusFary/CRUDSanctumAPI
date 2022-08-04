<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SanctumPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
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
            'deskripsi' => 'required|required|max:255'
        ]);

        return Post::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
    }

    /**
     * Search for judul
     *
     * @param  int  $id
     * @param str $judul, $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function search($judul)
    {
        return Post::where('judul', 'like', '%'.$judul.'%')->get();
    }

    /**
     * Search for deskripsi
     *
     * @param  int  $id
     * @param str $deskripsi
     * @return \Illuminate\Http\Response
     */
    public function search2($deskripsi)
    {
        return Post::where('deskripsi', 'like', '%'.$deskripsi.'%')->get();
    }

    
}
