<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Events\UserRegistered;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Freelanceres;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $validate = $request->validated();
        
        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'role' => $validate['role'] 
        ]);
         
        event(new UserRegistered($user));
        return response()->json([
            'status' => true,
            'message' => 'register successfoly',
            'user' => new UserDTO($user->name,$user->email,$user->role)
        ],201);
    }

    public function login(LoginRequest $request){
      $validate = $request->validated();
      if(!$token = auth('api')->attempt($validate)){
        return response()->json([
            'status' => false,
            'message' => 'user not found'
        ],403);
      }

      return response()->json([
        'status' => true,
        'message' => 'login successfully',
        'user' => auth('api')->user(),
        'token' => $token
      ],201);
    }
}
