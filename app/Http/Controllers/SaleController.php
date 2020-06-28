<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $obj;
    public function __construct(Sale $obj)
    {
        $this->obj = $obj;
    }

    public function index()
    {
        $result = Sale::all();
        $clients = Client::all();
        return view('system.sales.index', ['sales' => $result, 'clients' => $clients]);
    }

    public function create($id)
    {
        $products = Product::all();
        $client = Client::find($id);
        return view('system.sales.form', ['products' => $products, 'client' => $client]);
    }

    public function edit($id)
    {
        // $product = Product::findorfail($id);
        // $ingredients = $this->obj->withTrashed()->get();
        // return view('system.product.productIngredient', compact('product', 'ingredients'));
    }

    public function addProduct(Request $request, $id)
    {
        $product = Client::findorfail($id);
        $product = $request->only(['product_id', 'discount', 'price']);
        dd($product);

        // foreach ($list as $ingredient) {
        //     $result = $this->obj->get()
        //         ->where('product_id', $product_id);
        //     foreach ($result as $exist) {
        //         if ($exist->ingredient_id == $ingredient) {
        //             return redirect()->route('produto.show', $product_id)->with('error', 'o ingrediente ja está salvo');
        //         }
        //     }
        //     if (isset($result)) {
        //         $new = new ProductIngredients();
        //         $save = $new->create([
        //             'product_id' => $product->id,
        //             'ingredient_id' => $ingredient,
        //         ]);
        // if ($save) {
        //     return redirect()->route('produto.show', $product_id)->with('success', 'item adcionado com successo');
        // } else {
        //     return redirect()->back()->with('error', 'Houve um erro ao tentar adcionar os ingredientes');
        // }
        //     }
        // }
    }
    public function Qnt($id, $ing)
    {
        // $result = $this->obj->where('product_id', $id)->where('ingredient_id', $ing)->get()->first();
        // $ingredient = Ingredient::find($result->ingredient_id);
        // return view('system.Product.recipe', ['result' => $result, 'ingredient' => $ingredient]);
    }
    public function addQnt(Request $qnt, $product_id)
    {
        // $exist = $this->obj->get()->where('product_id', $product_id)->where('ingredient_id', $qnt->ingredient);
        // foreach ($exist as $ing) {
        //     // dd($ing->ingredient_id);
        //     // dd($ing->ingredient_id == $qnt->ingredient);
        //     if ($ing->ingredient_id == $qnt->ingredient) {
        //         $save = DB::table('product_ingredients')
        //             ->where('product_id', $ing->product_id)
        //             ->where('ingredient_id', $qnt->ingredient)
        //             ->update(['qnt' => $qnt->qnt]);
        //         if ($save) {
        //             return redirect()->route('produto.show', $product_id)->with('success', 'item adcionado com successo');
        //         } else {
        //             return redirect()->back()->with('error', 'Houve um erro ao tentar adcionar os ingredientes');
        //         }
        //     }
        //     redirect()->back()->with('warning', 'ocorreu um erro, recarregue a pagina e tente novamente');
        // }
    }
}
