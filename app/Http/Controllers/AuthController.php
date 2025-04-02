<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register API (name email password, confirm password)
    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Successfully registered',
        ], 201);
    }

    // Login API (email, password)
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login details',
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Successfully logged in',
            'token' => $token,
        ]);
    }

    // Profile API
    public function profile()
    {
        $user = Auth::user();

        return response()->json([
            'status' => true,
            'message' => 'User profile',
            'role' => $user->role, // Include the user's role in the response
            'is_admin' => $user->isAdmin(), // Check if the user is an admin
            'user' => $user,
        ]);
    }

    // Logout API
    public function logout() {
        Auth::logout();

        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out',
        ]);
    }
}
