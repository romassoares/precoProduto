<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
