<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Person;

class PersonController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'birthdate' => 'required|date',
            'city_id' => 'required',
            'company_branch_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/add/person')
                ->withInput()
                ->withErrors($validator);
        }

        $person = new Person;
        $person->lastname = $request->lastname;
        $person->firstname = $request->firstname;
        $person->birthdate = $request->birthdate;
        $person->city_id = $request->city_id;
        $person->company_branch_id = $request->company_branch_id;
        $person->save();

        return redirect('/');
    }

    public function update($id, Request $request) {
        $person = Person::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'birthdate' => 'required|date',
            'city_id' => 'required',
            'company_branch_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/editperson/'.$id)
                ->withInput()
                ->withErrors($validator);
        }

        $input = $request->all();
        $person->fill($input)->save();

        return redirect('/');
    }

    public function destroy(Person $person) {
        $person->delete();

        return redirect('/');
    }
}
