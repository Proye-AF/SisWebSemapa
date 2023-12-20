<?php

use Illuminate\Database\Migrations\Migration;

class DeleteUsers extends Migration
{
    public function up()
    {
        // Eliminar todos los usuarios
        \DB::table('users')->truncate();
    }

    public function down()
    {
        // La reversión no es necesaria ya que esta migración se utiliza para propósitos de reinicio
    }
}

