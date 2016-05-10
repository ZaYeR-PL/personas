<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class City extends Model
{
    public function person() {
        return $this->hasOne('App\Person');
    }
}
