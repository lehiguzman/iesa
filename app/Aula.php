<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'capacidad', 'descripcion'
    ];
}
