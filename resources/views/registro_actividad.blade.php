@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
<div class="container">
    <h1>Registrar Actividad o Proyecto y Unidad Responsable</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form method="POST" action="{{ route('guardar_actividad') }}">
    @csrf
    <div class="form-group">
        <label for="actividad_proyecto">Actividad o Proyecto:</label>
        <input type="text" name="actividad_proyecto" id="actividad_proyecto" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="unidad_responsable">Unidad Responsable:</label>
        <input type="text" name="unidad_responsable" id="unidad_responsable" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Actividad</button>
</form>

</div>
@endsection
