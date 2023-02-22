<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('user.index', compact('users'));
        // return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view(('user.create'));
    }
    public function profile()
    {
        //
        $profiles = User::all();
        return view('profile.index', compact('profiles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'password' => 'required',
            'passwordshow' => 'required',
            'telepon' => 'required',
        ],
    );
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'level' => $request->level,
            'password' => bcrypt ($request['password']),
            'passwordshow' => $request->passwordshow,
            'telepon' => $request->telepon,
        ]);
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $users = User::find($user->id);
        return view('user.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $users = User::find($user->id);
        return view('user.edit', compact('users'));
    }
    public function editprofile(User $user)
    {
        //
        $users = User::find($user->id);
        return view('profile.index', compact('users'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //
        // dd($request);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'telepon' => 'required'
        ]);

        $users = User::find($user->id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->level = $request->level;
        $users->telepon = $request->telepon;
        $users->update();
        return redirect('/user');
    }
    public function updateprofile(Request $request,User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'telepon' => 'required'
        ]);

        $users = User::find($user->id);
        $users->name = $request->name;
        $users->username = $request->username;
        $users->level = $request->level;
        $users->telepon = $request->telepon;
        $users->update();
        return redirect('profile.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $users = User::find($user->id);
        $users->delete();
        return redirect('/user');
    }
}
