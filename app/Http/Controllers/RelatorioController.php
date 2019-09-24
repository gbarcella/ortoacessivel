<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interesse;
use App\Tarefa;
use App\Emprestimo;
use App\Pessoa;
use App\Produto;
use Illuminate\Support\Facades\Auth;
use DB;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('relatorios.index');
    }

    public function interesses()
    {
        $id_usuario = Auth::id();
        $interesses = Interesse::where('id_usuario', $id_usuario)->get();

        return \PDF::loadView('relatorios.interesses', compact('interesses'))
                ->stream('lista-de-interesses.pdf');
    }

    public function tarefasMes()
    {
        $id_usuario = Auth::id();

        $mes_atual = date("m");
        
        $tarefas_mes = DB::table('tarefas')
                        ->whereRaw('id_usuario = ' . $id_usuario)
                        ->whereRaw('MONTH(prazo) = ' . $mes_atual)
                        ->get();

        return \PDF::loadView('relatorios.tarefas_mes', compact('tarefas_mes'))
                ->stream('tarefas-mes.pdf');
    }

    public function emprestimosPendentes()
    {
        $id_usuario = Auth::id();

        $emprestimos_pendentes = Emprestimo::where('id_usuario', $id_usuario)
                                            ->where('status', 'Pendente')
                                            ->get();
        
        return \PDF::loadView('relatorios.emprestimos-pendentes', 
                compact('emprestimos_pendentes'))
                ->stream('emprestimos-pendentes.pdf');
    }

    public function emprestimosAndamento()
    {
        $id_usuario = Auth::id();

        $emprestimos_andamento = Emprestimo::where('id_usuario', $id_usuario)
                                            ->where('status', 'Em andamento')
                                            ->get();

        return \PDF::loadView('relatorios.emprestimos-andamento',
                    compact('emprestimos_andamento'))
                    ->stream('emprestimos-andamento.pdf');
    }

    public function pessoasNovasMes()
    {
        $id_usuario = Auth::id();

        $mes_atual = date("m");

        $novas_pessoas_mes = DB::table('pessoas')
                                ->whereRaw('id_usuario = ' . $id_usuario)
                                ->whereRaw('MONTH(created_at) = '. $mes_atual)
                                ->get();
        
        return \PDF::loadView('relatorios.novas-pessoas-mes', compact('novas_pessoas_mes'))
                ->stream('novas-pessoas-mes.pdf');
    }

    public function produtosNovosMes()
    {
        $id_usuario = Auth::id();

        $mes_atual = date('m');

        $novos_produtos_mes = DB::table('produtos')
                                ->whereRaw('id_usuario = ' . $id_usuario)
                                ->whereRaw('MONTH(created_at) = ' . $mes_atual)
                                ->get();
        
        return \PDF::loadView('relatorios.novos-produtos-mes', compact('novos_produtos_mes'))
                ->stream('novos-produtos-mes.pdf');
    }

    public function produtosIndisponiveis()
    {
        $id_usuario = Auth::id();

        $produtos_indisponiveis = Produto::where('id_usuario', $id_usuario)
                                        ->where('status', 'Indisponivel')
                                        ->get();

        return \PDF::loadView('relatorios.produtos-indisponiveis', compact('produtos_indisponiveis'))
                ->stream('produtos-indisponiveis');
    }

    public function produtosDisponiveis()
    {
        $id_usuario = Auth::id();

        $produtos_indisponiveis = Produto::where('id_usuario', $id_usuario)
                                        ->where('status', 'Disponível')
                                        ->get();

        return \PDF::loadView('relatorios.produtos-indisponiveis', compact('produtos_indisponiveis'))
                ->stream('produtos-indisponiveis');
    }
}
