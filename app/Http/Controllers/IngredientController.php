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
        $result = $this->obj->all();
        return view('system/Ingredient/index', compact('result' ?? ''));
    }

    public function create()
    {
        return view('system/Ingredient/form');
    }

    public function store(Request $request)
    {
        $this->obj->construct($request);
        $result = $this->obj->create([
            'description' => $request->description,
            'und' => $request->und,
            'amount' => $request->amount,
            'price' => $request->price,
        ]);
        if ($result) {
            return redirect()->route('ingrediente.show', $result->id);
        }
    }

    public function show($id)
    {
        $result = $this->obj->find($id);
        return view('system/Ingredient/show', compact('result' ?? ''));
    }

    public function edit($id)
    {
        $result = $this->obj->find($id);
        return view('system/Ingredient/form', compact('result' ?? ''));
    }

    public function update(IngredientRequest $request, $id)
    {
        $result = $this->obj->cUpdate($request, $id);
        return redirect()->route('ingrediente.show', $result);
    }
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
