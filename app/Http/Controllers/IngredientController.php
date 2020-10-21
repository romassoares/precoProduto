<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    private $obj;

    public function __construct()
    {
        $this->obj = new Ingredient();
    }

    public function index()
    {
        $result = $this->obj->paginate(10);
        return view('system/Ingredient/index', compact('result'));
    }

    public function create()
    {
        return view('system/Ingredient/form');
    }

    public function store(IngredientRequest $request)
    {
        $ingredient = $request->only(['description', 'amount', 'und', 'price']);
        $result = $this->obj->cstore($ingredient);
        if ($result) {
            return redirect()->route('ingrediente.show', $result->id);
        }
    }

    public function show($id)
    {
        $result = $this->obj->find($id);
        return view('system/Ingredient/show', compact('result'));
    }

    public function edit($id)
    {
        $result = $this->obj->find($id);
        return view('system/Ingredient/form', compact('result'));
    }

    public function update(IngredientRequest $request, $id)
    {
        $ingredient = $request->only(['description', 'amount', 'und', 'price']);
        $result = $this->obj->cUpdate($ingredient, $id);
        return redirect()->route('ingrediente.show', $result);
    }
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
