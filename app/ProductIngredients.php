<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductIngredients extends Model
{
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
        if(isset($this->Ingredient)){
            switch ($this->Ingredient->und) {
                case 'f' || 'und':
                    $price = ($this->qnt * $this->Ingredient->price)/$this->Ingredient->amount+$this->qnt;
                    return number_format($price,2,',','.');
                    break;
                default:    
                    $price = ($this->qnt * $this->Ingredient->price);
                    return number_format($price,2,',','.');
                    break;
            }
        }
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
