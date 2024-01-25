<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags=Tag::all();
        $colors=Color::all();
     
        return view('product.edit',compact('product','tags','colors'));
    }
}
