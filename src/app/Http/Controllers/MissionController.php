<?php

namespace App\Http\Controllers;

use App\DTO\MissionDTO;
use App\Http\Requests\MissionRequest;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function store(MissionRequest $request){
        $validate = $request->validated();

        $mission = Mission::create($validate);

        return response()->json([
            'status' => true,
            'message' => 'mission created',
            'mission' => new MissionDTO($mission->titre,$mission->description,$mission->budget,$mission->technologies,$mission->type,$mission->status)
        ],201);
    }
}
