<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Sell extends Model
{
    // Nombre explícito de la colección en MongoDB
    protected $collection = 'sells';

    // Campos rellenables
    protected $fillable = ['customer_id', 'total', 'fecha'];

    // Relación con el modelo Customer
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', '_id'); // Relación inversa hacia el cliente
    }

    // Relación con el modelo SellDetails
    public function sell_details()
    {
        return $this->hasMany('App\SellDetails', 'sell_id', '_id'); // Relación con los detalles de esta venta
    }
}