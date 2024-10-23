@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>
    <form method="POST" action="{{ route('provider.store.reservation') }}">
        @csrf
        <div class="mb-3">
            <label for="service_provider_id" class="form-label">Proveedor de Servicio</label>
            <select name="service_provider_id" class="form-control" required>
                @foreach ($serviceProviders as $provider)
                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" class="form-control" name="date" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Hora</label>
            <input type="time" class="form-control" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Reserva</button>
    </form>
</div>
@endsection
