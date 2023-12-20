<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CargaCombustible;



class DetalleVehiculoController extends Controller
{
    public function listarReportes()
    
{
    $reportes = CargaCombustible::all(); // Obtén todos los informes de la tabla detalle_vehiculo

    return view('listar', compact('reportes'));
}


}
