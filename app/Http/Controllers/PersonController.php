<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;

class PersonController extends Controller
{	
	/**
	* @param Person $person
	* @return PersonResource
	*/

    public function show(Person $person): PersonResource {

    	return new PersonResource($person);
    }

    /**
    * @return PersonResourceCollection
    */

    public function index(): PersonResourceCollection {

    	return new PersonResourceCollection(Person::paginate());
    }

    /**
    * @param Request $request
    * @return PersonResource
    */

    public function store(Request $request) {
    	
    	// Create that Person
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required',
    		'phone' => 'required',
    		'city' => 'required'
    	]);

    	$person = Person::create($request->all());

    	return new PersonResource($person);
    }

    /**
    * @param Person $person
    * @param Request $request
    * @return PersonResource
    */

    public function update(Person $person, Request $request): PersonResource {
    	
    	// Update person
    	$person->update($request->all());

    	return new PersonResource($person);
    }

    /**
    * @param Person $person
    * @return \Illumintate\Http\JsonResponse
    * @throws \Exception
    */

    public function destroy(Person $person) {
    	
    	$person->delete();

    	return response()->json();
    }
}
