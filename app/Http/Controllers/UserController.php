<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class UserController extends Controller
{
    public function index()
    {
        // Logic to retrieve and return a list of users
        return(view('users.index',[
            'users' => DB::table('users')->paginate(10)
        ]));
    }
    public function create():View
    {
        // Logic to show a form for creating a new user
        return view('users.create');
    }
    public function store(Request $request)
    {
        // Logic to validate and store a new user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:writter,admin'
        ]);

        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        // Logic to retrieve and return a specific user by ID
        $user = DB::table('users')->find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }
        return view('users.show', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update a user's information
    }

    public function destroy($id)
    {
        // Logic to delete a user
        $user = DB::table('users')->find($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }


}
