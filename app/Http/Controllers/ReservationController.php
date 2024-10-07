<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Mostrar todas las reservas del usuario autenticado
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->with('room')->get();
        return view('reservations.index', compact('reservations'));
    }

    // Crear una nueva reserva
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
        ]);

        return response()->json($reservation, 201);
    }

    // Mostrar una reserva específica
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return response()->json($reservation);
    }

    // Actualizar una reserva
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'sometimes|exists:rooms,id',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date|after:start_time',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->only(['room_id', 'start_time', 'end_time']));

        return response()->json($reservation);
    }

    // Eliminar una reserva
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json(null, 204);
    }
}
