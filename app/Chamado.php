<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $fillable = [
        'id_usuario', 'titulo', 'descricao', 'prioridade', 'status'
    ];
}
