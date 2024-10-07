@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Reservas</h5>
                    <p class="card-text">150 Reservas</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Usuarios Activos</h5>
                    <p class="card-text">120 Usuarios</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pendientes</h5>
                    <p class="card-text">5 Reservas Pendientes</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Incidencias</h5>
                    <p class="card-text">3 Reportes</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
