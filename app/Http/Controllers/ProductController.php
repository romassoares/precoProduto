<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use App\Ingredient;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $obj;

    public function __construct()
    {
        $this->obj = new Product();
        $this->ing = new Ingredient();
    }

    public function index()
    {
        $result = $this->obj->all();
        return view('system/product/index', compact('result' ?? ''));
    }

    public function create()
    {
        return view('system/product/form');
    }

    public function store(Request $request)
    {
        $this->obj->construct($request);
        $result = $this->obj->create([
            'description' => $request->description,
            'amount' => $request->amount,
            'und' => $request->und,
            'price' => $request->price,
        ]);
        if ($result) {
            return redirect()->route('produto.show', $result->id);
        }
    }

    public function show($id)
    {
        $result = $this->obj->find($id);
        $ingredients = $this->ing->get()->all();
        return view('system/product/show', compact('result' ?? '', 'ingredients' ?? ''));
    }

    public function edit($id)
    {
        $result = $this->obj->find($id);
        return view('system/product/form', compact('result' ?? ''));
    }

    public function update(ProductRequest $request, $id)
    {
        $result = $this->obj->cUpdate($request, $id);
        return redirect()->route('produto.show', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
