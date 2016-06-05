<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Fighter extends Eloquent
{
    protected $fillable = ['identifier', 'hp', 'team', 'battle_id, user_id'];

    public function battle()
    {
        return $this->belongsTo('Battle');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }



}