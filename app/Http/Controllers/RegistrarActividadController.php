<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class RegistrarActividadController extends Controller
{
    public function mostrarFormulario()
    {
        return view('registro_actividad');
    }

    public function guardarActividad(Request $request)
    {
        $request->validate([
            'actividad_proyecto' => 'required',
            'unidad_responsable' => 'required',
        ]);

        $nuevaActividad = new Actividad();
        $nuevaActividad->actividad_proyecto = $request->input('actividad_proyecto');
        $nuevaActividad->unidad_responsable = $request->input('unidad_responsable');
        $nuevaActividad->save();

        return redirect()->route('registro_actividad')->with('success', 'Actividad registrada con éxito');
    }

     public function verActividades()
    {
        // Obtener todas las actividades desde la base de datos
        $actividades = Actividad::all();

        // Retornar la vista con las actividades
        return view('ver_actividades', ['actividades' => $actividades]);
    }
}
