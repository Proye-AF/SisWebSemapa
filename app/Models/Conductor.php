<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombres',
        'item',
        'cargo_actual',
        'license_number',
        'license_category',
        'expiry_date',
    ];

    /**
     * Verifica si el conductor tiene una licencia válida.
     *
     * @return bool
     */
    public function tieneLicenciaValida()
    {
        // Verifica si el conductor tiene un número de licencia y la categoría no está vacía
        // Puedes ajustar esta lógica según tus requisitos específicos
        return !empty($this->license_number) && !empty($this->license_category);
    }
}