<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use app\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'role_id'=>'required|exists:roles,id',
            'password' => 'required|min 5',
            'subscription_plan_id' => 'required|exists:subscription_plan,id'

        ]);
        User::create($validatedData);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        return view("users.show", compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        $roles=Role::all();
        return view("users.edit", compact('users','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);
       $validatedData = $request->validate([
                'name' => 'required|max:255',
                'role_id' => 'required|exists:roles,id',
           ]);
        $users->update($validatedData);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users.index');
    }
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}

