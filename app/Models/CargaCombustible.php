<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargaCombustible extends Model
{
    protected $table = 'carga_combustible';

    protected $fillable = [
        'marca',
        'tipo',
        'placa',
        'no_movil',
        'combustible_requerido',
        'codigo_materiales',
        'unidad',
        'unidad_responsable',
        'actividad_proyecto',
        'kilometraje',
        'cantidad_pedido',
        'cantidad_entregado',
        'precio_unitario',
        'precio_parcial',
        'precio_total',
        'item',
        'nombres',
        'nota',
        'username',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
    public function guardarCargaCombustible(Request $request)
    {
        // Validaciones y lógica de validación...

        // Asignar el nombre de usuario antes de guardar
        $cargaCombustible = new CargaCombustible();
        $cargaCombustible->username = auth()->user()->username;
        $cargaCombustible->marca = $request->input('marca');
        $cargaCombustible->tipo = $request->input('tipo');
        // ... otros campos ...

        $cargaCombustible->save();

        // Resto de la lógica, redireccionamiento, etc.
    }

}
