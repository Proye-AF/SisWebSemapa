<!-- resources/views/ver_reportes_combustible.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
    <div class="container">
        <h1>Lista de Reportes de Combustible</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código de Materiales</th>
                    <th>Descripción del Combustible</th>
                    <th>Unidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($combustibles as $combustible)
                    <tr>
                        <td>{{ $combustible->id }}</td>
                        <td>{{ $combustible->codigo_materiales }}</td>
                        <td>{{ $combustible->descripcion_combustible }}</td>
                        <td>{{ $combustible->unidad }}</td>
                        <td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
