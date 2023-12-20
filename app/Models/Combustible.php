<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    use HasFactory;

    protected $table = 'combustible'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'codigo_materiales',
        'descripcion_combustible',
        'unidad',
        // Agrega más campos si es necesario
    ];
}
