<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Stock extends Model
{
    protected $collection = 'stocks'; // Nombre de la colección en MongoDB

    // Relación con Product
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    // Relación con Category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Relación con User
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault([
            'id' => 0,
            'name' => 'Unknown User',
        ]);
    }

    // Relación con Vendor
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    // Relación con SellDetails
    public function sell_details()
    {
        return $this->hasMany('App\SellDetails', 'stock_id');
    }
}
