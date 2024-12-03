<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class SellDetails extends Model
{
    // Nombre explícito de la colección en MongoDB
    protected $collection = 'sell_details';

    // Campos rellenables
    protected $fillable = ['sell_id', 'producto', 'cantidad', 'precio'];

    // Relación con el modelo Sell
    public function sell()
    {
        return $this->belongsTo('App\Sell', 'sell_id', '_id'); // Relación inversa hacia la venta
    }
}