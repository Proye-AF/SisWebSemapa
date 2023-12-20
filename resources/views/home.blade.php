@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <title>Inicio</title>
</head>
<body>
    <main>
        <h2>Inicio</h2>
        <div class="grid-container">
            @if(auth()->user()->hasRole('admin'))
                <a class="button-link" href="{{ route('register.admin.user') }}">Registrar Usuarios de Personal</a>
                <a class="button-link" href="{{ route('mostrar_entrada_placa') }}">Carga de Combustible</a>
                <a class="button-link" href="{{ route('listar_combustible') }}">Imprimir Reporte de Combustible</a>
                <a class="button-link" href="{{ route('filtrar_reportes') }}">Ver Reportes</a>
                <a class="button-link" href="{{ route('registro_vehiculos') }}">Registro de Vehículos</a>
                <a class="button-link" href="{{ route('reporte_vehiculos') }}">Reporte de Vehículos</a>
                <a class="button-link" href="{{ route('registro_conductores') }}">Registro de Empleados</a>
                <a class="button-link" href="{{ route('reporte_conductores') }}">Reporte de Empleados</a>
                <a class="button-link" href="{{ route('registro_combustible')}}">Registrar Combustible</a>
                <a class="button-link" href="{{ route('ver_reportes_combustible') }}">Ver Reportes de Combustible</a>
                <a class="button-link" href="{{ route('registro_actividad') }}">Registrar Actividad</a>
                <a class="button-link" href="{{ route('ver_actividades') }}">Ver Actividades</a>
                <a class="button-link" href="{{ route('marcas.index') }}">Registrar Marcas de Vehículos</a>
                <a class="button-link" href="{{ route('tipos.index') }}">Registrar Tipos de Vehículos</a>
            @endif
            @if(auth()->user()->hasRole('user'))
                <a class="button-link" href="{{ route('mostrar_entrada_placa') }}">Carga de Combustible</a>
                <a class="button-link" href="{{ route('listar_combustible') }}">Imprimir Reporte de Combustible</a>    
                <a class="button-link" href="{{ route('reporte_vehiculos') }}">Reporte de Vehículos</a>
                <a class="button-link" href="{{ route('reporte_conductores') }}">Reporte de Empleados</a>
                <a class="button-link" href="{{ route('ver_reportes_combustible') }}">Ver Reportes de Combustible</a>
                <a class="button-link" href="{{ route('ver_actividades') }}">Ver Actividades</a>
            @endif
            @if(auth()->user()->hasRole('consultor'))
                <a class="button-link" href="{{ route('mostrar_entrada_placa') }}">Carga de Combustible</a>
                <a class="button-link" href="{{ route('listar_combustible') }}">Imprimir Reporte de Combustible</a> 
            @endif

        </div>
    </main>

</body>
</html>
@endsection
