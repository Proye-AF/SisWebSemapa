<!-- resources/views/reporte_combustible/ver.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
    <div class="container">
        <h1>Ver Reporte de Combustible</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th>Placa</th>
                    <th>Número de Móvil</th>
                    <th>Combustible Requerido</th>
                    <th>Unidad Responsable</th>
                    <th>Item</th>
                    <th>Nombre Conductor</th>
                    <th>Kilometraje</th>
                    <th>Cantidad Pedido</th>
                    <th>Cantidad Entregado</th>
                    <th>Precio Unitario</th>
                    <th>Precio Parcial</th>
                    <th>Precio Total </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>{{ $reporte->marca }}</td>
                    <td>{{ $reporte->tipo }}</td>
                    <td>{{ $reporte->placa }}</td>
                    <td>{{ $reporte->no_movil }}</td>
                    <td>{{ $reporte->combustible_requerido }}</td>
                    <td>{{ $reporte->unidad_responsable }}</td>
                    <td>{{ $reporte->item}}</td>
                    <td>{{ $reporte->nombres}}</td>
                    <td>{{ $reporte->kilometraje }}</td>
                    <td>{{ $reporte->cantidad_pedido }}</td>
                    <td>{{ $reporte->cantidad_entregado }}</td>
                    <td>{{ $reporte->precio_unitario }}</td>
                    <td>{{ $reporte->precio_parcial }}</td>
                    <td>{{ $reporte->precio_total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
