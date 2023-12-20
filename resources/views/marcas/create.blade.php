@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/estilos.css') }}">
    <h1>Registrar Marca de Vehículo</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('marcas.store') }}">
        @csrf
        <label for="nombre">Nombre de la Marca:</label>
        <input type="text" name="nombre" id="nombre" required>
        <button type="submit">Registrar Marca</button>
    </form>
@endsection
