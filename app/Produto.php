<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'codigo_identificacao', 'nome', 'data_recebimento', 'estado', 'procedencia', 'status', 'descricao', 'id_parceiro', 'id_usuario'
    ];
}
