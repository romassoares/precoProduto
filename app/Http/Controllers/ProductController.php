<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use App\Ingredient;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $obj, $ing, $pr, $request;

    public function __construct(ProductRequest $pr, Product $obj, Ingredient $ing, Request $request)
    {
        $this->obj = $obj;
        $this->ing = $ing;
        $this->pr = $pr;
        $this->request = $request;
    }

    public function index()
    {
        $result = $this->obj->all();
        return view('system/Product/index', compact('result' ?? ''));
    }

    public function create()
    {
        return view('system/Product/form');
    }

    public function store()
    {
        $result = $this->obj->cstore($this->request);
        dd($result);
        if ($result) {
            return redirect()->route('produto.show', $result->id);
        }
    }

    public function show($id)
    {
        $result = $this->obj->find($id);
        $ingredients = $this->ing->get()->all();
        return view('system/Product/show', compact('result' ?? '', 'ingredients' ?? ''));
    }

    public function edit($id)
    {
        $result = $this->obj->find($id);
        return view('system/Product/form', compact('result' ?? ''));
    }

    public function update($id)
    {
        $result = $this->obj->cUpdate($this->request, $id);
        return redirect()->route('produto.show', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
