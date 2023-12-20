<!-- resources/views/editar.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">

@section('content')
    <div class="container">
        <h1>Editar Reporte de Combustible</h1>

        <form method="POST" action="{{ route('guardar_edicion_reporte_combustible', ['id' => $reporte->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ $reporte->marca }}" readonly>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $reporte->tipo }}" readonly>
            </div>

            <div class="form-group">
                <label for="placa">Placa:</label>
                <input type="text" name="placa" id="placa" class="form-control" value="{{ $reporte->placa }}" readonly>
            </div>

            <div class="form-group">
                <label for="movil">Número de Móvil:</label>
                <input type="text" name="movil" id="movil" class="form-control" value="{{ $reporte->no_movil }}" readonly>
            </div>

            <div class="form-group">
                <label for="combustible_requerido">Combustible Requerido:</label>
                <input type="text" name="combustible_requerido" id="combustible_requerido" class="form-control" value="{{ $reporte->combustible_requerido }}" readonly>
            </div>

            <div class="form-group">
                <label for="unidad_responsable">Unidad Responsable:</label>
                <input type="text" name="unidad_responsable" id="unidad_responsable" class="form-control" value="{{ $reporte->unidad_responsable }}" readonly>
            </div>

            <div class="form-group">
                <label for="unidad_responsable">Item:</label>
                <input type="text" name="unidad_responsable" id="unidad_responsable" class="form-control" value="{{ $reporte->item }}" readonly>
            </div>

            <div class="form-group">
                <label for="unidad_responsable">Nombre Conductor:</label>
                <input type="text" name="unidad_responsable" id="unidad_responsable" class="form-control" value="{{ $reporte->nombres }}" readonly>
            </div>

            <div class="form-group">
                <label for="kilometraje">Kilometraje:</label>
                <input type="text" name="kilometraje" id="kilometraje" class="form-control" value="{{ $reporte->kilometraje }}" readonly>
            </div>

            <div class="form-group">
                <label for="cantidad_pedido">Cantidad Pedido:</label>
                <input type="text" name="cantidad_pedido" id="cantidad_pedido" class="form-control" value="{{ $reporte->cantidad_pedido }}" readonly>
            </div>

            <!-- Ahora agrega los campos editables -->

            <div class="form-group">
                <label for="cantidad_entregado">Cantidad Entregado:</label>
                <input type="text" name="cantidad_entregado" id="cantidad_entregado" class="form-control" value="{{ $reporte->cantidad_entregado }}" required> 
            </div>

            <div class="form-group">
                <label for="precio_unitario">Precio Unitario:</label>
                <input type="text" name="precio_unitario" id="precio_unitario" class="form-control" value="{{ $reporte->precio_unitario }}" required>
            </div>

            <div class="form-group">
                <label for="precio_parcial">Precio Parcial:</label>
                <input type="text" name="precio_parcial" id="precio_parcial" class="form-control" value="{{ $reporte->precio_parcial }}" required>
            </div>

            <div class="form-group">
                <label for="precio_total">Precio Total:</label>
                <input type="text" name="precio_total" id="precio_total" class="form-control" value="{{ $reporte->precio_total }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Edición</button>
        </form>
    </div>
@endsection
