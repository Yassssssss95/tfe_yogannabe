<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Action (on recupère les éléments)
        $customer= Customer::all();

        //Redirection
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create')
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer= new Customer();

        $customer->lastname= $request->lastname;
        $customer->firstname=$request->firstname;
        $customer->age=$request->age;
        $customer->message=$request->message;
        


        $customer->save();

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer =Customer:: find($id);

        return view('customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer =Customer:: find($id);

        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer= Customer:: find($id);

        $customer->lastname= $request->lastname;
        $customer->firstname=$request->firstname;
        $customer->age=$request->age;
        $customer->message=$request->message;
        


        $customer->update();

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer =Customer:: find($id);
        $customer->update();

        return redirect()->route('customer.index');
    }
}
