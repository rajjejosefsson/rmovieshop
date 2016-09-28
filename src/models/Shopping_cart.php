<?php
namespace Rsubscribe\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Shopping_cart extends Eloquent{

    public function user() {
        return $this->hasOne('Rsubscribe\models\User');
    }

    public function cartItems() {
        return $this->hasMany('Rsubscribe\models\Cart_items');
    }

}