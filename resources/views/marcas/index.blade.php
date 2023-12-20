@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/estilos.css') }}">
    <h1>Marcas de Vehículos</h1>

    <a href="{{ route('marcas.create') }}" class="btn btn-primary">Registrar Nueva Marca</a>

    <ul>
        @foreach($marcas as $marca)
            <li>{{ $marca->nombre }}</li>
        @endforeach
    </ul>
@endsection
