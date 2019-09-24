<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
    	'id_usuario', 'tarefa', 'prazo'
    ];
}
