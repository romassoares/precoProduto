<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'client_id', 'discount', 'price'
    ];

    public function setClient($value)
    {
        $this->client_id = $value;
    }
    public function getClient()
    {
        return $this->client_id;
    }

    public function setDiscount($value)
    {
        $this->discount = $value;
    }
    public function getDiscount()
    {
        return $this->discount;
    }

    public function setPrice($value)
    {
        $this->price = $value;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function Product()
    {
        return $this->hasMany('App\Product');
    }
}
