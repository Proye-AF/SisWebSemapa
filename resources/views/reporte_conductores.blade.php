@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
<div class="container">
    <h1>Reporte de Conductores</h1>

    <h2>Listado de Conductores</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Nombres</th>
                <th>Número de Licencia</th>
                <th>Categoría de Licencia</th>
                <th>Fecha de Expiración</th>
            </tr>
        </thead>
        <tbody>
        @foreach($conductores as $conductor)
                <tr>
                    <td>{{ $conductor->item}}</td>
                    <td>{{ $conductor->nombres }}</td>
                    <td>{{ $conductor->license_number }}</td>
                    <td>{{ $conductor->license_category }}</td>
                    @php
                        $currentDate = now();
                        $expiryDate = \Carbon\Carbon::parse($conductor->expiry_date);
                        $daysUntilExpiry = $currentDate->diffInDays($expiryDate);
                        $dateColor = ($daysUntilExpiry <= 30) ? 'red' : 'black';
                    @endphp
                    <td style="color: {{ $dateColor }}">{{ $conductor->expiry_date}}</td>
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

