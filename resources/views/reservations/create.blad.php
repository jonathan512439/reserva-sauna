@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nueva Reserva</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf

        <!-- Selección de la sala -->
        <div class="form-group">
            <label for="room_id">Sala:</label>
            <select class="form-control" id="room_id" name="room_id" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo para la fecha y hora de inicio -->
        <div class="form-group mt-3">
            <label for="start_time">Fecha y Hora de Inicio:</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>

        <!-- Campo para la fecha y hora de fin -->
        <div class="form-group mt-3">
            <label for="end_time">Fecha y Hora de Fin:</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>

        <!-- Estado de la reserva -->
        <div class="form-group mt-3">
            <label for="status">Estado:</label>
            <select class="form-control" id="status" name="status">
                <option value="pending">Pendiente</option>
                <option value="confirmed">Confirmada</option>
                <option value="completed">Completada</option>
                <option value="cancelled">Cancelada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Crear Reserva</button>
    </form>
</div>
@endsection
