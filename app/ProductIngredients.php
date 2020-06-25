<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ProductIngredients extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_id', 'ingredient_id', 'qnt'
    ];

    public function setProduct($value)
    {
        $this->product_id = $value;
    }
    public function getProduct()
    {
        return $this->product_id;
    }

    public function setIngredient($value)
    {
        $this->ingredient_id = $value;
    }
    public function getIngredient()
    {
        return $this->ingredient_id;
    }

    public function setQnt($value)
    {
        $this->qnt = $value;
    }
    public function getQnt()
    {
        return $this->qnt;
    }

    public function getValGasto()
    {
        $price = $this->qnt * $this->Ingredient->price;
        return number_format($price, 2, ',', '.');
    }

    // *****************************************************************************************
    // não sei como pegar getValGasto de todos os ingredientes
    public function getTotGasto()
    {
        $tot = $this->get()->all();
        $val = 0;
        foreach ($tot as $t) {
            $val += intval($this->getValGasto()) * $this->Ingredient->price;
        }
        return $val;
    }

    public function Ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }
    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}
