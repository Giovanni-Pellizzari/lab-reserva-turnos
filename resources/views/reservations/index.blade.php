@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor de Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->serviceProvider->name }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <form action="{{ route('provider.cancel', $reservation->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('provider.create.reservation') }}" class="btn btn-primary">Nueva Reserva</a>
</div>
@endsection
