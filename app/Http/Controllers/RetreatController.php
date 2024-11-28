<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetreatController extends Controller
{
    /**
     * Récupère tous les enregistrements
     */
    public function index()
    {
        //Action (on recupère les éléments)
        $retreat= Retreat::all();

        //Redirection
        return view('retreat.index', compact('retreat'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('retreat.create')
    }

    /**
     * céer un nouvel enregistrement
     */
    public function store(Request $request)
    {
        $retreat= new Retreat();

        $retreat->name= $request->name;
        $retreat->starting_date=$request->starting_date;
        $retreat->ending_date=$request->ending_date;
        $retreat->description=$request->description;
        $retreat->price = $request->price;
        $retreat->number_places=$request->number_places;
        $retreat->address=$request->address;


        $retreat->save();

        return redirect()->route('retreat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $retreat =Retreat:: find($id);

        return view('retreat.show',compact('retreat'));
    }

    /**
     * affiche le formulaire de modification
     */
    public function edit(string $id)
    {
        $retreat =Retreat:: find($id);
        return view('retreat.edit',compact('retreat'));
    }

    /**
     * Modifie l'enregistrement
     */
    public function update(Request $request, string $id)
    {
        $retreat =Retreat:: find($id);

        $retreat->name= $request->name;
        $retreat->starting_date=$request->starting_date;
        $retreat->ending_date=$request->ending_date;
        $retreat->description=$request->description;
        $retreat->price = $request->price;
        $retreat->number_places=$request->number_places;
        $retreat->address=$request->address;

        $retreat->update();

        return redirect()->route('retreat.index');

    }

    /**
     * Supprime un enregistrement
     */
    public function destroy(string $id)
    {
        $retreat =Retreat:: find($id);
        $retreat->update();

        return redirect()->route('retreat.index');

    }
}
