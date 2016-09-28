<?php

namespace Rsubscribe\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Item extends Eloquent {


    public function cart_items() {
        return $this->belongsToMany('Rsubscribe\models\Cart_item');
    }

    public function category() {
        return $this->hasOne('Rsubscribe\models\Category');
    }
}

