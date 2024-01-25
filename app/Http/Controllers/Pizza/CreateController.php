<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CrustDiameter;
use App\Models\CrustType;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories=Category::all();
        $crustDiameters=CrustDiameter::all();
        $crustTypes=CrustType::all();

        
        return view('pizza.create',compact('categories','crustDiameters','crustTypes'));
    }
}
