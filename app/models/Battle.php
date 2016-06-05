<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Battle extends Eloquent
{

    public function fighters()
    {
        return $this->hasMany('Fighter');
    }
}