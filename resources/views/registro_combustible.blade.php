@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
<div class="container">
    <h1>Registrar Combustible</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('registro_combustible') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigo_materiales">Código de Materiales:</label>
            <input type="text" name="codigo_materiales" id="codigo_materiales" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion_combustible">Descripción del Combustible:</label>
            <input type="text" name="descripcion_combustible" id="descripcion_combustible" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="unidad">Unidad:</label>
            <input type="text" name="unidad" id="unidad" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Combustible</button>
    </form>
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
