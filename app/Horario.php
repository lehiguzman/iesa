<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo', 'lapso', 'descripcion', 'observacion'
    ];
}
