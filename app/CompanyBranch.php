<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\Person;

class CompanyBranch extends Model
{
    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function person() {
        return $this->hasOne('App\Person');
    }
}
