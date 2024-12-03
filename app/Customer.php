<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Customer extends Model
{
    // Nombre explícito de la colección en MongoDB
    protected $collection = 'customers';

    // Campos rellenables
    protected $fillable = ['nombre', 'email', 'telefono'];

    // Relación con el modelo Sell
    public function sell()
    {
        return $this->hasMany('App\Sell', 'customer_id', '_id'); // Relación con la colección de ventas
    }

    // Relación con el modelo SellDetails
    public function sell_details()
    {
        return $this->hasMany('App\SellDetails', 'customer_id', '_id'); // Relación con los detalles de las ventas
    }
}
