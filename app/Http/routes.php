<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Person;
use App\Company;
use App\CompanyBranch;
use App\City;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::resource('person', 'PersonController');



    Route::get('/', function() {
        $people = Person::orderBy('created_at', 'asc')->get();

        return view('people', [
            'people' => $people,
        ]);
    });

    Route::get('/add/person', function() {

        $companies = Company::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();

        return view('personform', [
            'companies' => $companies,
            'cities' => $cities,
        ]);
    });

    Route::get('/editperson/{person}', function(Person $person) {

        $companies = Company::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();

        return view('personform', [
            'companies' => $companies,
            'cities' => $cities,
            'person' => $person,
        ]);
    });

    Route::get('/companyBranches', function(Request $request) {
        $branches = CompanyBranch::orderBy('name', 'asc')
            ->where('company_id', $request->id)
            ->get();
        return $branches;
    });

});
