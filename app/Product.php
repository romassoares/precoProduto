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
        $teste->construct($request);
        $teste->save();
        if ($teste) {
            return  $teste->id;
        }
    }

    public function cstore($request){
        $result = construct($request);
        $result->save();
        if($result){
            return $result;
        }
    }

    public function construct($request)
    {
        $this->setDescription($request['description']);
        $this->setAmount($request['amount']);
        $this->setUnd($request['und']);
        $this->setPrice(str_replace(',', '.', $request['price']));
    }
}
