<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'u_Id');
    }
    public function volunteer()
    {
        return $this->hasOne('App\User', 'id', 'v_Id');
    }
}
