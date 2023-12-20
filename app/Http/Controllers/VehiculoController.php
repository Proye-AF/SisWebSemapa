<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Tipo;
use App\Models\Actividad;

class VehiculoController extends Controller
{
    public function mostrarFormularioRegistro()
    {
        $marcas = Marca::pluck('nombre', 'id');
        $tipos = Tipo::pluck('nombre', 'id');
        $actividades = Actividad::all();

        return view('registro_vehiculoS', compact('marcas', 'tipos', 'actividades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_movil' => 'nullable|string',
            'marca' => 'required|string',
            'tipo' => 'required|string',
            'placa' => 'nullable|string',
            'unidad_responsable' => 'required',
            'actividad_proyecto' => 'required',
            'nota'=> 'nullable|string',
        ]);

        Vehiculo::create($request->all());

        return redirect()->route('registro_vehiculos')->with('success', 'Vehículo registrado con éxito.');
    }
}
