<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'description',
        'amount',
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
        $teste->construct($request);
        $teste->save();
        if ($teste) {
            return  $teste->id;
        }
    }


    public function construct($request)
    {
        $this->setDescription($request['description']);
        $this->setAmount($request['amount']);
        $this->setPrice(str_replace(',', '.', $request['price']));
    }
}
