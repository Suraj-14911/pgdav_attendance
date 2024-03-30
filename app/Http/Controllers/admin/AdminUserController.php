<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedata=$request->validate([
            'name'=> 'required|string|max:300',
            'email'=> 'required|unique:users,email|email',
            'role'=> 'required|string|max:200',
            'status' => 'required|string|max:200',
            'password'=>'required|string|max:100',
        ]);

        $users= new User();

        $users->name=$validatedata['name'];
        $users->email=$validatedata['email'];
        $users->role=$validatedata['role'];
        $users->status=$validatedata['status'];
        $users->password = bcrypt($validatedata['password']);

        $users->save();

        return redirect()->route('admin.user.create')->with('success','User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
