<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Emprestimo;
use App\Pessoa;
use App\Produto;
use Illuminate\Support\Facades\Auth;
use DB;

class Emprestimo extends Model
{
    protected $fillable = [
        'id_usuario', 'id_pessoa', 'id_produto', 'data_inicio', 'data_devolucao', 'status', 'observacoes'
    ];

    public static function pessoaDoEmprestimo(Emprestimo $emprestimo)
    {
    	$id_usuario = Auth::id();

        $pessoa = DB::table('pessoas')->where('id_usuario', $id_usuario)
                                            ->where('id', $emprestimo->id_pessoa)
                                            ->first();
        return $pessoa;
    }

    public static function produtoDoEmprestimo(Emprestimo $emprestimo)
    {
    	$id_usuario = Auth::id();

        $produto = DB::table('produtos')->where('id_usuario', $id_usuario)
                                            ->where('id', $emprestimo->id_produto)
                                            ->first();
        return $produto;
    }

    public function pessoa()
    {
        return $this->hasOne('App\Pessoa', 'id', 'id_pessoa');
    }

    public function produto()
    {
        return $this->hasOne('App\Produto', 'id', 'id_produto');
    }
}
