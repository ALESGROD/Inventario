<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $connection = 'mongodb'; // Conexión a MongoDB
    protected $collection = 'products'; // Nombre de la colección

    // Relación con categoría
    public function category()
    {
        return $this->belongsTo('App\Category')->withDefault([
            'id' => 0,
            'name' => 'unknow category',
        ]);
    }

    // Relación con stock
    public function stock()
    {
        return $this->hasMany('App\Stock');
    }

    // Relación con detalles de venta
    public function sell_details()
    {
        return $this->hasMany('App\SellDetails');
    }
}
