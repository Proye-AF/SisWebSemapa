<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaCombustibleTable extends Migration
{
    public function up()
    {
        Schema::create('carga_combustible', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('tipo');
            $table->string('placa')->nullable();
            $table->string('no_movil');
            $table->string('combustible_requerido');
            $table->string('codigo_materiales');
            $table->string('unidad');
            $table->string('unidad_responsable');
            $table->string('actividad_proyecto');
            $table->string('item');
            $table->string('nombres');
            $table->string('kilometraje');
            $table->string('nota')->nullable();
            $table->string('cantidad_pedido');
            $table->string('cantidad_entregado')->nullable();
            $table->string('precio_unitario')->nullable();
            $table->string('precio_parcial')->nullable();
            $table->string('precio_total')->nullable();
            $table->string('anulado')->nullable();
            $table->string('username')->nullable(); // Añadido para el nombre de usuario
            $table->integer('year');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carga_combustible');
    }
}
