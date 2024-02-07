<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        
        $data=$request->validated();

        $data['password']=Hash::make($data['password']);

        User::firstOrCreate([
            'email'=>$data['email']
        ],$data);
        return response()->json(['message' => 'User created successfully']);
    }
}