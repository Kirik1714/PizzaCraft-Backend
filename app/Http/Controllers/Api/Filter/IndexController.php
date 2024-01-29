<?php

namespace App\Http\Controllers\Api\Filter;

use App\Http\Controllers\Controller;
use App\Http\Filters\PizzaFilter;
use App\Http\Requests\API\FilterRequest;
use App\Models\Category;
use App\Models\Pizza;



class IndexController extends Controller
{
    public function __invoke()
    {
        $filters=Category::all();
        return response()->json($filters);
    }
}
