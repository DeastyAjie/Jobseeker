<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register user baru
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required|in:HRD,Society'
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>false, 'errors'=>$validator->errors()], 400);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return response()->json(['status'=>true, 'message'=>'New App Owner has registered', 'data'=>$user], 201);
    }

    // Login user
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['status'=>false, 'message'=>'Invalid credentials'], 401);
        }

        return response()->json(['status'=>true, 'message'=>'Login success', 'data'=>$user]);
    }
}
