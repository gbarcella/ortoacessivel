<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome', 'sobrenome', 'telefone', 'telefone2', 'nascimento', 'email', 'sexo', 'renda', 'cpf', 'estado', 'cidade', 'endereco', 'bairro', 'numero', 'id_usuario'
    ];

}
