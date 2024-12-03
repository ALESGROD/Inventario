<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Company extends Model
{
    protected $collection = 'companies'; // Nombre de la colección en MongoDB

    // Define las relaciones y otros métodos aquí, según lo necesites.
}