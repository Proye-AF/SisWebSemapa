<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Consultor extends Authenticatable
{
    protected $fillable = ['name', 'username', 'password', 'role', 'fecha_caducidad'];
    protected $table = 'consultor';

}
