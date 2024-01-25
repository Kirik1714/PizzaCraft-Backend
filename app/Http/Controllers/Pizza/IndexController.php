<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Controllers\Controller;
use App\Models\Pizza;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke()
    {
        $pizzas = Pizza::all();
        return view('pizza.index', compact('pizzas'));
    }
}
