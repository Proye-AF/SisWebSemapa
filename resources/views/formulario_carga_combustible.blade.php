@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                @if(isset($vehiculo))
                    <!-- Formulario para cargar combustible -->
                    <h1>Solicitud Carga de Combustible para {{ $vehiculo->placa }}</h1>
                    <form method="POST" action="{{ route('registrar_carga_combustible') }}">
                        @csrf
                        <input type="hidden" name="placa" value="{{ $vehiculo->placa }}">
                        <div class="form-group">
                            <label for="marca">Marca:</label>
                            <input type="text" name="marca" id="marca" class="form-control" readonly value="{{ $vehiculo->marca }}">
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo:</label>
                            <input type="text" name="tipo" id="tipo" class="form-control" readonly value="{{ $vehiculo->tipo }}">
                        </div>
                        <div class="form-group">
                            <label for="placa_vehiculo">Placa:</label>
                            <input type="text" name="placa_vehiculo" id="placa_vehiculo" class="form-control" readonly value="{{ $vehiculo->placa }}">
                        </div>
                        <div class="form-group">
                            <label for="no_movil">Número de Móvil:</label>
                            <input type="text" name="no_movil" id="no_movil" class="form-control" readonly value="{{ $vehiculo->no_movil }}">
                        </div>
                        <div class="form-group">
                            <label for="tipo_combustible">Combustible que usa:</label>
                            <select name="tipo_combustible" id="tipo_combustible" required onchange="autocompletarCombustible()">
                                <option value="">Selecciona un combustible</option>
                                @foreach($combustibles as $combustible)
                                    <option value="{{ $combustible->descripcion_combustible }}" data-codigo="{{ $combustible->codigo_materiales }}" data-unidad="{{ $combustible->unidad }}">{{ $combustible->descripcion_combustible }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="codigo_materiales">Código de Materiales:</label>
                            <input type="text" name="codigo_materiales" id="codigo_materiales" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="unidad">Unidad:</label>
                            <input type="text" name="unidad" id="unidad" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="unidad_responsable">Unidad Responsable:</label>
                            <input type="text" name="unidad_responsable" id="unidad_responsable" class="form-control" readonly value="{{ $vehiculo->unidad_responsable }}">
                        </div>
                        <div class="form-group">
                            <label for="actividad_proyecto">Actividad/Proyecto:</label>
                            <input type="text" name="actividad_proyecto" id="actividad_proyecto" class="form-control" readonly value="{{ $vehiculo->actividad_proyecto }}">
                        </div>
                        <div class="form-group">
                            <label for="item_chofer">Número de Item del Chofer:</label>
                            <select name="item" id="item" required onchange="autocompletarChofer()">
                                <option value="">Selecciona su Item</option>
                                @foreach($conductores as $conductores)
                                    <option value="{{ $conductores->item }}" data-nombres="{{ $conductores->nombres }}">{{ $conductores->item }} {{ $conductores->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="chofer">Nombre del Chofer:</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kilometraje">Kilometraje:</label>
                            <input type="text" name="kilometraje" id="kilometraje" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cantidad_pedido">Cantidad Pedido:</label>
                            <input type="text" name="cantidad_pedido" id="cantidad_pedido" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nota">Nota:</label>
                            <input type="text" name="nota" id="nota" class="form-control" readonly value="{{ $vehiculo->nota }}">
                        </div>
                        <div class="form-group">
                            <label for="useer">Usuario</label>
                            <input type="text" name="username" readonly value="{{ auth()->user()->username }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                @else
                    <p>Error: No se encontró información del vehículo. Regrese a la página anterior.</p>
                @endif
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
    <script src="{{ asset('sema/scripts.js') }}"></script>
@endsection
