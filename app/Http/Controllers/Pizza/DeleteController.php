<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke()
    {
        $product->delete();
  
        return redirect()->route('product.index');

    }
}
