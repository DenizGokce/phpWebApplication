<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::all()->toArray();
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = (object)$request->json()->all();
        $newPerson = new Person([
            'firstname' => $person->firstname,
            'lastname' => $person->lastname
        ]);
        $newPerson->save();
        //return redirect()->route('person.index')->with('success', 'Data Added!');
        return response()->json(json_encode($newPerson));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);
        return response()->json(json_encode($person));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit()
    {
        $people = Person::all()->toArray();
        return view('person.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $person = (object)$request->json()->all();
        $existPerson = Person::find($person->id);
        $existPerson->firstname = $person->firstnam;
        $existPerson->lastname = $person->lastname;
        $existPerson->save();
        return response()->json(json_encode($existPerson));
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $people = Person::all()->toArray();
        return view('person.delete', compact('people'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existPerson = Person::find($id);
        Person::destroy($id);
        return response()->json(json_encode($existPerson));
    }

}
