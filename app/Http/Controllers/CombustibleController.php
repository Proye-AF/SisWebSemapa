<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\CargaCombustible;
use App\Models\Combustible;
use App\Models\Conductor;

class CombustibleController extends Controller
{
    public function mostrarEntradaPlaca()
    {
        return view('entrada_placa');
    }

    public function buscarVehiculo(Request $request)
    {
        $request->validate([
            'movil' => 'required|string',
        ]);

        $movil = $request->input('movil');
        $vehiculo = Vehiculo::where('no_movil', $movil)->first();

        if (!$vehiculo) {
            return back()->with('error', 'Vehículo no encontrado. Verifique el número de móvil e intente de nuevo');
        }

        $request->session()->put('vehiculo', $vehiculo);

        return redirect()->route('mostrar_formulario_carga_combustible');
    }

    public function mostrarFormularioCargaCombustible()
    {
        $vehiculo = session('vehiculo');

        if (!$vehiculo) {
            return back()->with('error', 'Error al cargar el formulario. Intente de nuevo.');
        }

        $combustibles = Combustible::select('descripcion_combustible', 'codigo_materiales', 'unidad')->get();
        $conductores = Conductor::all('item', 'nombres');

        return view('formulario_carga_combustible', compact('vehiculo', 'combustibles', 'conductores'));
    }

    public function registrarCargaCombustible(Request $request)
{
    $request->validate([
        //'placa' => 'required',
        'kilometraje' => 'required',
        'cantidad_pedido' => 'required',
        'tipo_combustible' => 'required',
        'item' => 'required',
    ]);

    $combustibles = Combustible::select('descripcion_combustible', 'codigo_materiales', 'unidad')->get();
    $combustibleSeleccionado = $request->input('tipo_combustible');
    $combustible = $combustibles->where('descripcion_combustible', $combustibleSeleccionado)->first();
    $nota = $request->input('nota');

    if (!$combustible) {
        return back()->with('error', 'Error al obtener información del tipo de combustible. Intente de nuevo.');
    }

    $placa = $request->input('placa');
    $kilometraje = $request->input('kilometraje');
    $cantidad_pedido = $request->input('cantidad_pedido');

    $vehiculo = Vehiculo::where('placa', $placa)->first();

    if (!$vehiculo) {
        return back()->with('error', 'Error al obtener información del vehículo. Intente de nuevo.');
    }
    $noMovil = $vehiculo->no_movil;

    // Validar la licencia del conductor antes de guardar los datos
    $itemChofer = $request->input('item');
    $conductor = Conductor::where('item', $itemChofer)->first();

    if (!$conductor || !$conductor->tieneLicenciaValida()) {
        // No se encontró el conductor o no tiene una licencia válida
        return back()->with('error', 'El conductor seleccionado no tiene una licencia válida para ser chofer.');
    }

    // Obtener el nombre de usuario
    $username = auth()->user()->username;

    CargaCombustible::create([
        'placa' => $placa,
        'marca' => $vehiculo->marca,
        'tipo' => $vehiculo->tipo,
        'no_movil' => $vehiculo->no_movil,
        'combustible_requerido' => $combustible->descripcion_combustible,
        'codigo_materiales' => $combustible->codigo_materiales,
        'unidad' => $combustible->unidad,
        'unidad_responsable' => $vehiculo->unidad_responsable,
        'actividad_proyecto' => $vehiculo->actividad_proyecto,
        'item' => $conductor->item,
        'nombres' => $conductor->nombres,
        'kilometraje' => $kilometraje,
        'cantidad_pedido' => $cantidad_pedido,
        'nota' => $vehiculo->nota,
        'username' => $username,
    ]);

    $request->session()->forget('vehiculo');

    return redirect()->route('mostrar_entrada_placa')->with('success', 'Carga de combustible registrada con éxito');
    }
}
