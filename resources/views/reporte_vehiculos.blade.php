@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
<div class="container">
    <h1>Reporte de Vehículos</h1>
   
    <h2>Listado de Vehículos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Numero de Movil</th>
                <th>Marca</th>
                <th>Placa</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->no_movil }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->tipo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
