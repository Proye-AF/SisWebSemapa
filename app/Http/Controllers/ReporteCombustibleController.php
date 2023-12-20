<?php

// app/Http/Controllers/ReporteCombustibleController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CargaCombustible;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class ReporteCombustibleController extends Controller
{
    public function listarCombustible()
    {
        // Obtener la lista de usuarios
        $usuarios = User::all();

        // Obtener todos los reportes de combustible
        $reportes = CargaCombustible::orderBy('created_at', 'desc')->get();

        return view('listar', compact('reportes', 'usuarios'));
    }
    public function listar(Request $request)
    {
        // Obtener la lista de usuarios
        $usuarios = User::all();

        // Inicializar la variable de reportes filtrados
        $reportesFiltrados = [];

        // Verificar si se enviaron parámetros de filtrado
        if ($request->filled('usuario') || ($request->filled('fecha_inicio') && $request->filled('fecha_fin'))) {
            $query = CargaCombustible::query();

            // Filtrar por usuario si se proporciona
            if ($request->filled('usuario')) {
                $query->where('username', $request->input('usuario'));
            }

            // Filtrar por fecha si se proporciona
            if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
                $query->whereBetween('created_at', [$request->input('fecha_inicio'), $request->input('fecha_fin')]);
            }

            // Obtener los reportes filtrados
            $reportesFiltrados = $query->orderBy('created_at', 'desc')->get();
        }

        return view('listar', compact('reportesFiltrados', 'usuarios'));
    }


    public function verReporte($id)
    {
        $reporte = CargaCombustible::find($id);
        return view('ver', compact('reporte'));
    }

    public function imprimirReporte($id)
    {
        $reporte = CargaCombustible::find($id);
    
        return view('imprimir', compact('reporte'));
    }
    public function imprimirMatricial($id)
    {
    
        $reporte = CargaCombustible::find($id);

        return view('imprimir_matricial', compact('reporte'));
    }


    public function guardarInformacionAdicional(Request $request, $id)
    {
        // Validaciones...

        $reporte = CargaCombustible::find($id);

         // Actualizar los campos editables
        $reporte->cantidad_entregado = $request->input('cantidad_entregado');
        $reporte->precio_unitario = $request->input('precio_unitario');
        $reporte->precio_parcial = $request->input('precio_parcial');
        $reporte->precio_total = $request->input('precio_total');

        // Guardar los cambios
        $reporte->save();

        return redirect()->route('listar_reportes_combustible')->with('success', 'El reporte se actualizó correctamente');
    }

    public function editar($id)
    {
        $reporte = CargaCombustible::find($id);
        return view('editar', compact('reporte'));
    }

    public function anular(Request $request, $id)
    {
        // Validaciones...

        $reporte = CargaCombustible::find($id);

        // Actualizar el estado a anulado
        $reporte->anulado = true;
        $reporte->save();

        return redirect()->route('listar_reportes_combustible')->with('success', 'El reporte se ha anulado correctamente.');
    }

    public function filtrarReportes(Request $request)
    {
        try {
        $query = CargaCombustible::query();

        // Filtrar por usuario si se proporciona y no es vacío
        if ($request->filled('usuario')) {
            $usuario = strtolower($request->input('usuario'));
            $query->whereRaw('LOWER(username) = ?', [$usuario]);
        }

        // Filtrar por fecha si se proporciona
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('created_at', [
                $request->input('fecha_inicio') . ' 00:00:00',
                $request->input('fecha_fin') . ' 23:59:59'
            ]);
        }

        // Obtener los reportes filtrados
        $reportesFiltrados = $query->orderBy('created_at', 'desc')->get();

        // Obtener la lista de usuarios
        $usuarios = User::all();

        // Cargar la vista con los reportes filtrados y usuarios
        return view('ver_reportes', compact('reportesFiltrados', 'usuarios'));
        } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
