<!-- resources/views/ver_reportes.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
    <h1 style="text-align: center;">Lista de Reportes de Combustible</h1>

    <!-- Filtros -->
    <form method="post" action="{{ route('filtrar_reportes') }}">
        @csrf
        <label for="usuario">Ver por Usuario:</label>
        <select name="usuario" id="usuario">
            <option value="">Todos los Usuarios</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->username }}</option>
            @endforeach
        </select>
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio">
        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="date" name="fecha_fin">
        <button type="submit">Filtrar</button>
    </form>

    <!-- Tabla de Reportes -->
    <table class="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Movil</th>
                <th>Combustible</th>
                <th>Codigo Materiales</th>
                <th>Usuario</th>
                <th>Precio Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody class="botones" id="reportes-container">
            <!-- Mostrar los reportes filtrados -->
            @foreach ($reportesFiltrados as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->no_movil }}</td>
                    <td>{{ $reporte->combustible_requerido }}</td>
                    <td>{{ $reporte->codigo_materiales }}</td>
                    <td>{{ $reporte->username }}</td>
                    <td>{{ $reporte->precio_total }}</td>
                    <td>{{ $reporte->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
