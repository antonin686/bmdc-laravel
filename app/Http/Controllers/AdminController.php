<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::whereIn('role', [3, 4])->get();

        foreach ($admins as $admin) {
            if ($admin->role == 3) {
                $admin->role = 'General Admin';
            }
            if ($admin->role == 4) {
                $admin->role = 'Medicine Admin';
            }
        }

        return view('admin.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'username' => 'required|unique:users|min:3',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = new User;

        $user->name = $request->full_name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        $message = "New Admin Has Been Created";
        return redirect()->route('admin.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::find($id);

        if ($admin->role == 3) {
            $admin->role = 'General Admin';
        }
        if ($admin->role == 4) {
            $admin->role = 'Medicine Admin';
        }

        return view('admin.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);

        if ($admin->role == 3) {
            $admin->role = 'General Admin';
        }
        if ($admin->role == 4) {
            $admin->role = 'Medicine Admin';
        }

        return view('admin.edit')->with('admin', $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
