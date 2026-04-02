<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function profile(ProfileClientRequest $request){
       $validate = $request->validated();

       $client = auth('api')->user()->client;
       if(!$client){
        return response()->json([
            'status' => false,
            'message' => ' client not found'
        ],403);
       }

       $client->update($validate);
       
       return response()->json([
        'status' => true,
        'message' => 'client updated',
        'profile' => $client
       ],204);
    }
}
