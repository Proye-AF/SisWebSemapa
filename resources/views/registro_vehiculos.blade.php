@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('sema/estilos.css') }}">
    <title>Registro Vehículo</title>
</head>
<body>
    <header>
        <h1>SEMAPA - Registro de Vehículo</h1>
    </header>
    <main>
        <h2>Registro de Vehículo</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form id="vehicle-registration-form" method="POST" action="{{ route('store_vehiculo') }}">
            @csrf <!-- Agrega el campo CSRF token -->
            <div class="form-group">
                <label for="no_movil">No de Móvil:</label>
                <input type="text" id="no_movil" name="no_movil" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca del Vehículo:</label>
                <select name="marca" id="marca">
                    <option value="">Selecciona la Marca</option>
                    @foreach($marcas as $id => $nombre)
                        <option value="{{ $nombre }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo">
                    <option value="">Selecciona el Tipo</option>
                    @foreach($tipos as $id => $nombre)
                        <option value="{{ $nombre }}">{{ $nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="placa">Número de Placa:</label>
                <input type="text" id="placa" name="placa">
            </div>
            <div class="form-group">
                <label for="unidad_responsable">Unidad Responsable:</label>
                <select name="unidad_responsable" id="unidad_responsable" required onchange="autocompletarUnidadResponsable()">
                    <option value="">Selecciona una unidad responsable</option>
                    @foreach($actividades as $actividad)
                        <option value="{{ $actividad->unidad_responsable }}" data-actividad="{{ $actividad->actividad_proyecto }}">{{ $actividad->unidad_responsable }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="actividad_proyecto">Actividad/Proyecto:</label>
                <input type="text" id="actividad_proyecto" name="actividad_proyecto" required>
            </div>
            <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="text" id="nota" name="nota">
            </div>
            <button type="submit">Registrar Vehículo</button>
        </form>

    <script>
        

        function autocompletarUnidadResponsable() {
            var selectedUnidadResponsable = document.getElementById('unidad_responsable');
            var actividadProyectoInput = document.getElementById('actividad_proyecto');

            var selectedOption = selectedUnidadResponsable.options[selectedUnidadResponsable.selectedIndex];

            if (selectedOption.value !== '') {
                actividadProyectoInput.value = selectedOption.getAttribute('data-actividad');
            } else {
                actividadProyectoInput.value = '';
            }
        }
    </script>
</body>
</html>
@endsection

