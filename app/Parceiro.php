<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model
{
    protected $fillable = [
        'nome', 'fisica_juridica', 'telefone', 'email', 'estado', 'cidade', 'endereco', 'bairro', 'numero', 'id_usuario'
    ];
}
