@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Mis Reservas</h2>

        @if($reservations->isEmpty())
            <p>No tienes reservas en este momento.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Sala</th>
                        <th class="py-2 px-4">Fecha y Hora de Inicio</th>
                        <th class="py-2 px-4">Fecha y Hora de Fin</th>
                        <th class="py-2 px-4">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td class="py-2 px-4">{{ $reservation->id }}</td>
                            <td class="py-2 px-4">{{ $reservation->room->name }}</td>
                            <td class="py-2 px-4">{{ $reservation->start_time }}</td>
                            <td class="py-2 px-4">{{ $reservation->end_time }}</td>
                            <td class="py-2 px-4">{{ $reservation->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
