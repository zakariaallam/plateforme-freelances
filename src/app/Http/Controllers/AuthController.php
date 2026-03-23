<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\RegisterRequest;
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
         
        return response()->json([
            'status' => true,
            'message' => 'register successfoly',
            'user' => new UserDTO($user->name,$user->email,$user->role)
        ]);
    }

    public function login(){
      
    }
}
