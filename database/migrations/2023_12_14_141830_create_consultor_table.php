<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultorTable extends Migration
{
    public function up()
    {
        Schema::create('consultor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['consultor']); // Rol específico para consultores
            $table->date('fecha_caducidad'); // Campo para la fecha de caducidad
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultor');
    }
}
