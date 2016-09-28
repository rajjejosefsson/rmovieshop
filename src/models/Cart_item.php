<?php

namespace Rsubscribe\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Cart_item extends Eloquent {

    public function shoppingCarts() {
        return $this->hasMany('Rsubscribe\models\Shopping_cart');
    }

    public function item() {
        return $this->hasMany('Rsubscribe\models\Item');
    }


}