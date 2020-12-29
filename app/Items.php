<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    protected $fillable = [
        'sale_id', 'product_id', 'price', 'amount'
    ];

    public function setClient($value)
    {
        $this->client_id = $value;
    }
    public function getClient()
    {
        return $this->client_id;
    }
    public function setPrice($value)
    {
        $this->price = $value;
    }
    public function getPrice()
    {
        return number_format(str_replace(array('.', ','), array('', '.'), $this->price), 2, ',', '.');
    }

    public function setAmount($value)
    {
        $this->amount = $value;
    }
    public function getAmout()
    {
        return $this->amount;
    }

    public function getPriceTot()
    {
        $priceT = floatval(str_replace(array('.', ','), array('', '.'), $this->price)) * floatval($this->amount);
        return number_format(floatval($priceT), 2, ',', '.');
    }

    public function Sale()
    {
        return $this->hasMany('App\Sale');
    }
    public function Product()
    {
        return $this->belongsTo('App\Product');
    }
}
