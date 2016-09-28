<?php

namespace Rsubscribe\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{


    public function shoppingcart() {
       return $this->hasOne('Rsubscribe\models\Shopping_cart');
    }

}
