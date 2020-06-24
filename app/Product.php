<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'description',
        'amount',
        'und',
        'price',
    ];

    public function setDescription($value)
    {
        $this->description = $value;
    }
    public function getDesciption(): string
    {
        return $this->description;
    }

    public function setAmount($value)
    {
        $this->amount = $value;
    }
    public function getAmount()
    {
        return $this->amount;
    }

    public function setUnd($value)
    {
        $this->und = $value;
    }
    public function getUnd()
    {
        return $this->und;
    }

    public function setPrice($value)
    {
        $this->price = $value;
    }
    public function getPrice()
    {
        return number_format($this->price, 2, ',', '.');
    }

    public function cUpdate($request, $id)
    {
        $teste = Product::find($id);
        $result = $teste->update($request);
        if ($result) {
            return  $result;
        }
    }

    public function cstore($request)
    {
        $novo = new Product;
        $result = $novo->create($request);
        if ($result) {
            return $result;
        }
    }
    public function Ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'product_ingredients', 'product_id', 'ingredient_id');
    }
}
