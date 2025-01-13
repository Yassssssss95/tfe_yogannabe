<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retreat;

class BookingController extends Controller
{
    public function form()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('message', 'Veuillez vous connecter pour réserver une retraite');
        }
        
        $retreats = Retreat::all();
        
        return view('booking.form', [
            'retreats' => $retreats,
            'user' => auth()->user()
        ]);
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // On ajoutera la logique de sauvegarde plus tard
        return redirect()->route('home')->with('success', 'Votre réservation a bien été prise en compte');
    }
}