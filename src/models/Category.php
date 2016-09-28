<?php

namespace Rsubscribe\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent {


    public function items() {
        return $this->belongsToMany('Rsubscribe\models\Item');
    }




}
