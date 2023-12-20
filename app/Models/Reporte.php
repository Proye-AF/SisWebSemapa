<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reportes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre_conductor',
        'nombre_usuario',
        'aprobado_por',
        'funcionario_estacion',
        'fecha',
    ];
}
