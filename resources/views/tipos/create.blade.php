@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/estilos.css') }}">
    <h1>Registrar Tipo de Vehículo</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('tipos.store') }}">
        @csrf
        <label for="nombre">Nombre del Tipo:</label>
        <input type="text" name="nombre" id="nombre" required>
        <button type="submit">Registrar Tipo</button>
    </form>
@endsection
