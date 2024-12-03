<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Payment extends Model
{
    // realtion with customer 
    protected $collection = 'payments';

    public function customer(){

    	return $this->belongsTo('App\Customer');
    }

    // relation with user 


    public function user(){
     
        return $this->belongsTo('App\User')->withDefault([
            'id' => 0,
            'name' => 'Unknown User'
          ]);

    }
}
