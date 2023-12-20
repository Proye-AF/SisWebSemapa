<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class ReporteVehiculosController extends Controller
{
    public function index()
{
    $vehiculos = Vehiculo::all(); // Suponiendo que 'Vehiculo' sea el nombre de tu modelo de vehículos
    return view('reporte_vehiculos', compact('vehiculos'));
}


}
