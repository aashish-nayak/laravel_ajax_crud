<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'desc' => 'required|string',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|string|max:50',
        ]);

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
        } else {
            $profilePath = null;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'desc' => $request->desc,
            'profile' => $profilePath,
            'role_id' => $request->role,
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function list()
    {
        $users = User::with('role')->latest()->get();
        return response()->json($users);
    }
}
