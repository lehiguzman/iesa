<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'observacion', 'prof_id', 'oferta_id', 'aula_id'
    ];
}
