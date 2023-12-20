@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">

@section('content')
    
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <!-- Formulario para buscar vehículo por número de móvil -->
                <h1>Ingresar Número de Móvil del Vehiculo</h1>
                <form method="POST" action="{{ route('buscar_vehiculo') }}">
                    @csrf
                    <label for="movil">Número de Móvil del Vehiculo</label> <!-- Cambio aquí -->
                    <input type="text" id="movil" name="movil" placeholder="Ingrese el número de móvil"> <!-- Cambio aquí -->
                    <button type="submit">Buscar Vehiculo</button>
                </form>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
