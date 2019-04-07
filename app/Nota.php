<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_id', 'materia_id', 'periodo_id', 'prof_id', 'nota'
    ];
    
}
