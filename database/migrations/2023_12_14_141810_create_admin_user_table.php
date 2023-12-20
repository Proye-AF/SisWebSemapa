<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUserTable extends Migration
{
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'usuario']); // Puedes ajustar los roles según tus necesidades
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}