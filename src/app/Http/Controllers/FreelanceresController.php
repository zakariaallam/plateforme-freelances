<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFreelancerRequest;
use App\Models\Freelanceres;
use Illuminate\Support\Facades\Auth;

class FreelanceresController extends Controller
{

    public function showPofile(){
        $freelancer = Auth::user()->Freelanceres;
        return response()->json([
            'status' => true,
            'message' => 'show my profile',
            'profile' => $freelancer
        ]);
    }
    public function profile(ProfileFreelancerRequest $request){
        $validate = $request->validated();

        $freelancer = Auth::user()->Freelanceres;
        if(!$freelancer){
            return response()->json([
                'status' => false,
                'message' => 'Aunotorized',
            ],403);
        }
        $freelancer->update($validate);

        return response()->json([
            'status' => true,
            'message' => 'update successfully',
            'profile' => $freelancer
        ]);
    }
}
