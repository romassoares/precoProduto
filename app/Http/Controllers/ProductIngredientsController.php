<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductIngredients;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        $list = $request->except(['_method', '_token']);

        foreach ($list as $ingredient) {
            $result = $this->obj->find($ingredient);
            if (isset($result)) {
                return redirect()->route('produto.show', $product_id)->with('error', 'o ingrediente ja está salvo');
            } else {
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
            }
        }
    }
    public function addQnt(Request $qnt, $product_id)
    {
        $product = $product_id;
        dd($qnt->ingredient);
        $exist = $this->obj->get()->where('product_id', $product);
        foreach ($exist as $ing) {
            if ($ing->ingredient_id == $qnt->ingredient) {
                $save = DB::table('product_ingredients')
                    ->where('product_id', $product)
                    ->where('ingredient_id', $qnt->ingredient)
                    ->update(['qnt' => $qnt->qnt]);
                if ($save) {
                    return redirect()->route('produto.show', $product_id)->with('success', 'item adcionado com successo');
                } else {
                    return redirect()->back()->with('error', 'Houve um erro ao tentar adcionar os ingredientes');
                }
            }
            redirect()->back()->with('warning', 'ocorreu um erro, recarregue a pagina e tente novamente');
        }
    }
}
