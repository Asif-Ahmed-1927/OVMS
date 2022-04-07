<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'u_id');
    }
    public function volunteer()
    {
        return $this->hasOne('App\User', 'id', 'v_id');
    }
}
