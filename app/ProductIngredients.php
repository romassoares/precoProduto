<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ProductIngredients extends Model
{
    // use SoftDeletes;
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
        if (isset($this->Ingredient->und) === 'f' || isset($this->Ingredient->und) === 'und') {
            $price = ($this->qnt * floatval(str_replace(array(','), array('.'), $this->Ingredient->price))) / $this->Ingredient->amount + $this->qnt;
            return number_format($price, 2, ',', '.');
        } else {
            $price = ($this->qnt * floatval(str_replace(array(','), array('.'), $this->Ingredient->price)));
            return number_format($price, 2, ',', '.');
        }
    }

    public function Ingredient()
    {
        return $this->belongsTo('App\Ingredient')->withTrashed();
    }

    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}
