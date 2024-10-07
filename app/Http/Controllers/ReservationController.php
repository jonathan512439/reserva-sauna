<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReservationController extends Controller
{
    // Mostrar todas las reservas del usuario autenticado
    public function index()
{
    $reservations = auth()->user()->reservations; // Obtener las reservas del usuario autenticado
    return view('dashboard', compact('reservations'));
}
public function create()
{
    // Obtener todas las salas disponibles
    $rooms = Room::all(); // Asegúrate de que Room sea el modelo de la tabla de salas

    return view('reservations.create', compact('rooms'));
}
    // Crear una nueva reserva
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',  // Asegura que la sala existe
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        auth()->user()->reservations()->create([
            'room_id' => $request->room_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard')->with('success', 'Reserva creada exitosamente.');
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
    public function create()
    {
    return view('reservations.create'); // Asegúrate de crear la vista en resources/views/reservations/create.blade.php
    }

}
