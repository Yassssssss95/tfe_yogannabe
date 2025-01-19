<?php

namespace App\Http\Controllers;

use App\Models\Retreat;
use App\Models\Booking;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'activeRetreats' => Retreat::where('starting_date', '>', now())->count(),
            'pendingBookings' => Booking::where('status', 'pending')->count(),
            'registeredUsers' => User::count()
        ];

        return view('admin.dashboard', compact('stats'));
    }
}