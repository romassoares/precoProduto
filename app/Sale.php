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
        return number_format($this->price, 2, ',', '.');
    }

    public function Product()
    {
        return $this->belongsTo('App\Product')->withTrashed();
    }
    public function Client()
    {
        return $this->belongsTo('App\Client')->withTrashed();
    }
}
