@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Conductor</title>
    
</head>
<body>
    <header>
        <h1>SEMAPA - Registro de Empleados</h1>
    </header>
    <main>
        <h2>Registro de Empleados</h2>
        @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        <form id="driver-registration-form" method="POST" action="{{ route('registro_conductores') }}">
            @csrf <!-- Agrega el campo CSRF token -->
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" id="nombres" name="nombres" required>
            </div>
              <div class="form-group">
                <label for="item">Item:</label>
                <input type="text" id="item" name="item" required>
            </div>
            <div class="form-group">
                <label for="cargo-actual">Cargo Actual:</label>
                <input type="text" id="cargo-actual" name="cargo-actual" required>
            </div>
            <div class="form-group">
                <label for="license-number">Número de Licencia:</label>
                <input type="text" id="license-number" name="license-number">
            </div>
            <div class="form-group">
                <label for="license-category">Categoría de Licencia:</label>
                <select id="license-category" name="license-category">
                    <option value="" disabled selected>Seleccione una categoría</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="M">M</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="form-group">
                <label for="expiry-date">Fecha de Expiración:</label>
                <input type="date" id="expiry-date" name="expiry-date">
            </div>
            <button type="submit">Registrar Empleado</button>
        </form>
    </main>

</body>
</html>

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
