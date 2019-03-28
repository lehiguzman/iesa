<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'periodo_id', 'observacion'
    ];
}
