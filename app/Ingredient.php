<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'description',
        'und',
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

    public function setUnd($value)
    {
        $this->und = $value;
    }
    public function getUnd()
    {
        return $this->und;
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

    public function cUpdate($request, $id){
        $teste = Ingredient::find($id);
        $result = $teste->update($request);
        if ($result) {
            return  $result;
        }
    }

    public function cstore($request){
        $novo = new Ingredient;
        $result = $novo->create($request);
        if($result){
            return $result;
        }
    }

}
