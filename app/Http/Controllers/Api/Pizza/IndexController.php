<?php

namespace App\Http\Controllers\Api\Pizza;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Http\Request;

use function Termwind\render;

class IndexController extends Controller
{
    public function __invoke()
    {
        $pizzas = Pizza::with(['crustDiameter','crustType'])->get();
        return response()->json($pizzas);
    }
}
