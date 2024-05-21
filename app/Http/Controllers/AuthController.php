<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response([
                'message' => 'Invalid credentials',
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token,
        ]); 
    }
    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'message' => 'Logged out successfully',
        ]);
    }
    
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
        ]);
        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
