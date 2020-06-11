<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductIngredients;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductIngredientsController extends Controller
{
    private $obj;
    public function __construct(ProductIngredients $obj)
    {
        $this->obj = $obj;
    }

    public function edit($id)
    {
        $product = Product::findorfail($id);
        $ingredients = $this->obj->withTrashed()->get();
        return view('system.product.productIngredient', compact('product', 'ingredients'));
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::findorfail($product_id);
        $list = $request->all();
        $ingre = [];
        for ($i = 1; $i < count($list); $i++) {
            if (isset($list['ingredient_' . $i])) {
                $ingre = Arr::prepend($ingre, $list['ingredient_' . $i]);
            }
        }
        if (isset($ingre)) {
            foreach ($ingre as $ingredient) {
                // dd("aiaia");
                // $i = ProductIngredients::get()->where('product_id', '=', $product->id);
                // $i = $this->obj->get()->where('product_id', $product_id);
                // dd($i);
                // foreach ($i  as $ingreExist) {
                // dd('sdsd');
                // if ($ingreExist->ingredient_id != $ingredient || !$ingreExist) {
                $new = new ProductIngredients();
                $save = $new->create([
                    'product_id' => $product->id,
                    'ingredient_id' => $ingredient,
                ]);
                if ($save) {
                    return redirect()->route('produto.show', $product_id)->with('success', 'item adcionado com successo');
                } else {
                    return redirect()->back()->with('error', 'Houve um erro ao tentar adcionar os ingredientes');
                }
                // } else {
                //     return redirect()->route('produto.show', $product_id)->with('error', 'o ingrediente ja está salvo');
                // }
                // }
            }
        } else {
            return redirect()->back()->with('error', 'Error ao selecionar o item');
        }
    }
}
