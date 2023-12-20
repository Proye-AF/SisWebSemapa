<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tipos',
        ]);

        Tipo::create($request->all());

        return redirect()->route('tipos.index')->with('success', 'Tipo registrado con éxito');
    }
}
