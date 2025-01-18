<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Retreat;
use Illuminate\Http\Request;

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
        // Vérifier si la retraite existe et a des places disponibles
        $retreat = Retreat::findOrFail($request->retreat_id);
        
        if ($retreat->number_places <= 0) {
            return redirect()->back()->with('error', 'Désolé, il n\'y a plus de places disponibles pour cette retraite.');
        }

        // Vérifier si l'utilisateur n'a pas déjà réservé cette retraite
        $existingBooking = Booking::where('user_id', auth()->id())
                                ->where('retreat_id', $retreat->id)
                                ->where('status', '!=', 'cancelled')
                                ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé cette retraite.');
        }

        // Créer la réservation
        $booking = new Booking();
        $booking->user_id = auth()->id();
        $booking->retreat_id = $retreat->id;
        $booking->message = $request->message;
        $booking->status = 'pending';
        $booking->save();

        // Décrémenter le nombre de places disponibles
        $retreat->number_places -= 1;
        $retreat->save();

        // Envoyer un email de confirmation

        return redirect()->route('home')->with('success', 'Votre réservation est en attente. Nous reviendrons vers vous par mail le plus rapidement possible.');
    }

    public function myBookings()
{
    $bookings = Booking::where('user_id', auth()->id())
        ->with('retreat')  // Pour charger les détails des retraites
        ->orderBy('created_at', 'desc')
        ->get();

    return view('booking.my-bookings', compact('bookings'));
}
public function adminIndex()
{
    $bookings = Booking::with(['user', 'retreat'])
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin.bookings.index', compact('bookings'));
}

public function confirm(Booking $booking)
{
    $booking->status = 'confirmed';
    $booking->save();
    
    
    return redirect()->route('admin.bookings.index')
        ->with('success', 'La réservation a été confirmée avec succès');
}

public function cancel(Booking $booking)
{
    $booking->status = 'cancelled';
    $booking->save();
    
    // On remet la place disponible
    $booking->retreat->increment('number_places');
    
    
    return redirect()->route('admin.bookings.index')
        ->with('success', 'La réservation a été annulée avec succès');
}
}