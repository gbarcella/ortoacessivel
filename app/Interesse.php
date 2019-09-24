<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'interesse','id_usuario'
    ];
}
