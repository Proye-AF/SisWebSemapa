@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
<div class="container">
    <h1>Lista de Actividades y Proyectos con Unidades Responsables</h1>

    <!-- Mostrar mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Actividad o Proyecto</th>
                <th>Unidad Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->id }}</td>
                    <td>{{ $actividad->actividad_proyecto }}</td>
                    <td>{{ $actividad->unidad_responsable }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
