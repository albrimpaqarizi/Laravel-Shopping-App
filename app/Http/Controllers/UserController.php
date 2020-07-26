<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;

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
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', compact('user','roles')); 
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
        $request->validate([
            'role_id'=>'required',
        ]);

        $user = User::find($id);
        $user->name = $user->name;
        $user->email = $user->email;
        $user->role_id = $request->get('role_id');

        $user->save();
        return redirect('/users')->with('success', 'User updated!');
    }

    // public function editManage($id)
    // {
    //     $user = User::find($id);
    //     return view('manage', compact('user')); 
    // }

    // public function updateManage(Request $request, $id)
    // {
    //     $request->validate([
    //         'name'=>'required',
    //         'email'=>'required|email',
    //         'city'=>'required',
    //         'age'=>'required',
    //         'image' => 'file|image|mimes:jpeg,png,gif,jpg|max:2048',
    //     ]);

    //     $user = User::find($id);
    //     $user->name = $request->get('name');
    //     $user->email = $request->get('email');
    //     $user->city = $request->get('city');
    //     $user->age = $request->get('age');
       
    //     if($request->hasFile('image')){
    //         // Storage::delete($user->image);
    //         $file = $request->file('image');
    //         $fileName = time().'.'.$file->getClientOriginalName();
    //         $filePath = $file->store('profile');
    //         $user->image = $filePath;
    //     } else {
    //         $user->image;
    //     }

    //     $user->save();
    //     return redirect('/')->with('success', 'User updated!');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $image_path = $user->image;
        Storage::delete($image_path);
        $user -> delete();

        return redirect('/users') ->with('success','User deleted!');
    }
}
