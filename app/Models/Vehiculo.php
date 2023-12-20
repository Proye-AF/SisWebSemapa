<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'no_movil',
        'marca',
        'tipo',
        'placa',
        'unidad_responsable',
        'actividad_proyecto',
        'anulado',
        'nota',

    ];
}
