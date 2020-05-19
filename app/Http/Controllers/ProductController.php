<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $obj;

    public function __construct()
    {
        $this->obj = new Product();
    }

    public function index()
    {
        $result = $this->obj->all();
        return view('system/product/index', compact('result'));
    }

    public function create()
    {
        return view('system/product/form');
    }

    public function store(Request $request)
    {
        $result = $this->obj->create([
            'description' => $request->description,
            'amount' => $request->amount,
            'price' => $request->price,
        ]);
        if ($result) {
            return view('system/product/index', compact('result'));
        }
    }

    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
