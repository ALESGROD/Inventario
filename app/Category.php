<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $collection = 'categories'; // Nombre de la colección en MongoDB

    // Relación con Product
    public function product()
    {
        return $this->hasMany('App\Product');
    }
}