<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SanctumUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
            'name' => 'required|max:35',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password'=> 'required|min:5|max:20'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        return User::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
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
        $user = User::find($id);
        
        $validatedData = $request->validate([
            'name' => '',
            'username' => '',
            'email' => '',
            'password' => ''
        ]);

        if(isset($validatedData['password']))        
            $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $user->id)
            ->update($validatedData);

            return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }

    /**
     * Search for name
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return User::where('name', 'like', '%'.$name.'%')->get();
    }
}


