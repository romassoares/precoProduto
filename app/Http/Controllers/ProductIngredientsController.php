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
        var_dump($list);
        $ingre = [];
        for ($i = 1; $i < count($list); $i++) {
            if (isset($list['ingredient_' . $i])) {
                $ingre = Arr::prepend($ingre, $list['ingredient_' . $i]);
            }
        }
        var_dump($ingre);
        if ($ingre == true) {
            foreach ($ingre as $ingredient) {
                $new = new ProductIngredients();
                $save = $new->create([
                    'product_id' => $product->id,
                    'ingredient_id' => $ingredient,
                ]);
            }
            if ($save) {
                return redirect()->route('produto.show', $product_id);
            } else {
                return redirect()->back()
                    ->with('error', 'Houve um erro ao tentar editar os orgãos participantes');;
            }
        }
    }
}
