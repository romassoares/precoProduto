<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductIngredients;
use Illuminate\Http\Request;

class ProductIngredientsController extends Controller
{
    public function store(Request $request,Product $product,$id)
    {
        $item = $request->all();
        $p = $product->find($id);

        return redirect()->route('produto')
    }

    public function edit(ProductIngredients $productIngredients)
    {
        //
    }

    public function update(Request $request, ProductIngredients $productIngredients)
    {
        //
    }

    public function destroy(ProductIngredients $productIngredients)
    {
        //
    }
}
