<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\CompanyBranch;
use DateTime;

class Person extends Model
{
    protected $fillable = [
        'lastname', 'firstname', 'city_id', 'birthdate', 'company_branch_id',
    ];

    public function city() {
        return $this->belongsTo('App\City');
    }

    public function companyBranch() {
        return $this->belongsTo('App\CompanyBranch');
    }

    public function age() {
        $from = new DateTime('1970-02-01');
        $to   = new DateTime('today');
        return $from->diff($to)->y;
    }
}
