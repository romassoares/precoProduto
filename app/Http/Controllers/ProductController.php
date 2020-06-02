<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use App\Ingredient;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $obj, $ing;

    public function __construct(Product $obj, Ingredient $ing)
    {
        $this->obj = $obj;
        $this->ing = $ing;
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

    public function store(ProductRequest $request)
    {
       $product = $request->only(['description', 'amount', 'und', 'price']);
        $salvo = $this->obj->cstore($product);
        if ($salvo) {
            return redirect()->route('produto.show', $salvo->id);
        }else{
            return redirect()->route('produto.create',compact('request'));
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

    public function update(Request $request,$id)
    {
        $product = $request->only(['description', 'amount', 'und', 'price']);
        $result = $this->obj->cUpdate($product, $id);
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
