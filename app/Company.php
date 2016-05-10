<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CompanyBranch;

class Company extends Model
{
    public function companyBranch() {
        return $this->hasMany('App\CompanyBranch');
    }
}
