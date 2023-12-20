@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/estilos.css') }}">
@section('content')

    <h1>Tipos de Vehículos</h1>

    <a href="{{ route('tipos.create') }}" class="btn btn-primary">Registrar Nuevo Tipo</a>

    <ul>
        @foreach($tipos as $tipo)
            <li>{{ $tipo->nombre }}</li>
        @endforeach
    </ul>
@endsection
