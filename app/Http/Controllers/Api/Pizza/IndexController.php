<?php

namespace App\Http\Controllers\Api\Pizza;

use App\Http\Controllers\Controller;
use App\Http\Filters\PizzaFilter;
use App\Http\Requests\API\FilterRequest;
use App\Models\Pizza;



class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(PizzaFilter::class, ['queryParams' => array_filter($data)]);
        $pizzas = Pizza::filter($filter)->with(['crustDiameter','crustType'])->paginate(4, ['*'], 'page', $data['page']);
      

        return response()->json($pizzas);
    }
}
