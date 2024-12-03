<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable; // Cambiado para MongoDB

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Nombre de la colección en MongoDB.
     */
    protected $collection = 'users';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Los atributos que se deben ocultar en arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relación con Stock.
     */
    public function stock()
    {
        return $this->hasMany('App\Stock');
    }

    /**
     * Relación con Sell.
     */
    public function sell()
    {
        return $this->hasMany('App\Sell');
    }

    /**
     * Relación con Payment.
     */
    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Relación con SellDetails.
     */
    public function sell_details()
    {
        return $this->hasMany('App\SellDetails');
    }

    /**
     * Relación con Role.
     */
    public function role()
    {
        return $this->belongsTo('App\Role')->withDefault([
            'id' => 0,
            'role_name' => 'Guest Role',
        ]);
    }
}