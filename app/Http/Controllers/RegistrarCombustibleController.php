<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combustible;

class RegistrarCombustibleController extends Controller
{
    public function mostrarFormulario()
    {
        return view('registro_combustible');
    }

    public function guardarCombustible(Request $request)
    {
        $request->validate([
            'codigo_materiales' => 'required',
            'descripcion_combustible' => 'required',
            'unidad' => 'required',
        ]);

        $nuevoCombustible = new Combustible();
        $nuevoCombustible->codigo_materiales = $request->input('codigo_materiales');
        $nuevoCombustible->descripcion_combustible = $request->input('descripcion_combustible');
        $nuevoCombustible->unidad = $request->input('unidad');
        $nuevoCombustible->save();

        return redirect()->route('mostrar_formulario_combustible')->with('success', 'Combustible registrado con éxito');
    }

    public function verReportesCombustible()
    {
        $combustibles = Combustible::all();
        return view('reportes_combustible', ['combustibles' => $combustibles]);
    }
}

