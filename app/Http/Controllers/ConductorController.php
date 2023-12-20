<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;
use Carbon\Carbon;

class ConductorController extends Controller
{
    public function index()
    {
        return view('registro_conductores');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string',
            'item' => 'nullable|string',
            'cargo-actual' => 'nullable|string',
            'license-number' => 'nullable|string',
            'license-category' => 'nullable|string',
            'expiry-date' => 'nullable|date',
        ]);

        $conductor = new Conductor();
        $conductor->nombres = $request->input('nombres');
        $conductor->item = $request->input('item');
        $conductor->cargo_actual = $request->input('cargo-actual');
        $conductor->license_number = $request->input('license-number');
        $conductor->license_category = $request->input('license-category');
        $conductor->expiry_date = $request->input('expiry-date');
        $conductor->save();

        return redirect()->route('registro_conductores')->with('success', 'Empleado registrado con éxito.');
    }
    public function reporteConductores()
    {
        $conductores = Conductor::all();
    
        foreach ($conductores as $conductor) {
            $conductor->daysUntilExpiry = Carbon::parse($conductor->expiry_date)->diffInDays(now());
        }
    
        return view('reporte_conductores', compact('conductores'));
    }

}
