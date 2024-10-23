<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user', 'serviceProvider')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|time',
            'service_provider_id' => 'required|exists:service_providers,id',
        ]);

        Reservation::create([
            'user_id' => auth()->id(),
            'service_provider_id' => $request->service_provider_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('provider.reservations')->with('success', 'Reserva creada con éxito.');
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('provider.reservations')->with('success', 'Reserva cancelada.');
    }
}

