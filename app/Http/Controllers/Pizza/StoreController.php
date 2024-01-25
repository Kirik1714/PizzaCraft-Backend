<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pizza\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Pizza;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
       $data =$request->validated();
        
       $data['image_url'] = Storage::disk('public')->put('/images', $data['image_url']);
       $data['image_url'] = asset('storage/' . $data['image_url']);
       

       $categoryIds=$data['categories'];
       $crustDiametersIds=$data['crustDiameters'];
       $crustTypes=$data['crustTypes'];

       unset($data['categories'], $data['crustDiameters'],$data['crustTypes']);

       $pizza=Pizza::firstOrCreate([
           'name'=>$data['name'],
       ], $data);
       
       $pizza->categories()->attach($categoryIds);
       $pizza->crustDiameter()->attach($crustDiametersIds);
       $pizza->crustType()->attach($crustTypes);
  
       
        return redirect()->route('pizza.index');

    
    }
}
