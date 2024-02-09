<?php

namespace App\Http\Controllers\Api\Pizza;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {      
  
        $pizza = Pizza::with(['crustDiameter','crustType'])->findOrFail($id);
        if(!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }   

        return response()->json($pizza);
    }
}
