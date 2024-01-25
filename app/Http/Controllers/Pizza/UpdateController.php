<?php

namespace App\Http\Controllers\Pizza;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        // Если загружено новое изображение
        if ($request->hasFile('preview_image')) {
            // Удалить старое изображение, если оно существует
            if ($product->preview_image) {
                Storage::disk('public')->delete($product->preview_image);
            }

            // Сохранить новое изображение
            $data['preview_image'] = Storage::disk('public')->put('/images', $request->file('preview_image'));
        }

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product->tags()->sync($tagsIds);
        $product->colors()->sync($colorsIds);
        $product->update($data);

        return view('product.show', compact('product'));
    }
}
