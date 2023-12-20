<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades'; // Nombre de la tabla en la base de datos

    protected $fillable = ['actividad_proyecto', 'unidad_responsable']; // Campos que se pueden llenar
}
