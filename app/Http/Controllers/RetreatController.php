<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retreat;
use Illuminate\Support\Facades\Storage;

class RetreatController extends Controller
{

    public function adminIndex()
{
    $retreats = Retreat::all();
    return view('admin.retreats.index', compact('retreats'));
}
    /**
     * Récupère tous les enregistrements
     */
    public function index()
    {
        //Action (on recupère les éléments)
        $retreats= Retreat::all();
        //Redirection
        return view('retreat.index', compact('retreats'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('admin.retreats.create');
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
        $retreat->longitude=$request->longitude;
        $retreat->latitude=$request->latitude;

        


       // Gestion des images multiples
       $imagePaths = [];
       if($request->hasFile('images')) {
           foreach($request->file('images') as $image) {
               $path = Storage::disk('public')->put('assets', $image);
               $imagePaths[] = $path;
           }
       }
       $retreat->image_path = implode(',', $imagePaths);
   
       $retreat->save();
   
       return redirect()->route('admin.retreats.index')->with('success', 'Retraite créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $retreat =Retreat:: find($id);

        return view('admin.retreats.show', compact('retreat')); 
        }

    /**
     * affiche le formulaire de modification
     */
    public function edit(string $id)
    {
        $retreat =Retreat:: find($id);
        return view('admin.retreats.edit', compact('retreat')); 
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
        $retreat->longitude=$request->longitude;
        $retreat->latitude=$request->latitude;

        


        $file = $request->file('image');
        $namefile = Storage::disk('public')->put('assets',$file);

        $retreat->image_path = $namefile;

        $retreat->update();

        return redirect()->route('admin.retreats.index');
    }

    /**
     * Supprime un enregistrement
     */
    public function destroy(string $id)
    {
        $retreat =Retreat:: find($id);
        $retreat->delete();

        return redirect()->route('admin.retreats.index');
    }
}
