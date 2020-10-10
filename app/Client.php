<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'city',
        'district',
        'street',
        'number',
        'contact'
    ];

    public function setName($value)
    {
        $this->name = $value;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setCity($value)
    {
        $this->city = $value;
    }
    public function getCity()
    {
        return $this->city;
    }

    public function setDistrict($value)
    {
        $this->district = $value;
    }
    public function getDistrict()
    {
        return $this->district;
    }

    public function setStreet($value)
    {
        $this->street = $value;
    }
    public function getStreet()
    {
        return $this->street;
    }

    public function cUpdate($request, $id)
    {
        $teste = Client::find($id);
        $result = $teste->update($request);
        if ($result) {
            return  $result;
        }
    }

    public function cstore($request)
    {
        $novo = new Client;
        $result = $novo->create($request);
        if ($result) {
            return $result;
        }
    }
    // public function Ingredients()
    // {
    //     return $this->belongsToMany('App\Ingredient', 'product_ingredients', 'product_id', 'ingredient_id');
    // }
}
