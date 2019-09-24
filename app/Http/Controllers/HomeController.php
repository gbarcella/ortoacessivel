<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Emprestimo;
use App\Produto;
use App\Pessoa;
use App\Parceiro;
use App\Interesse;
use App\Tarefa;
use Charts;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_usuario = Auth::id();
        
        $emprestimos = Emprestimo::where('id_usuario', '=', $id_usuario)->get();
        $count_emprestimos = count($emprestimos);

        $produtos = Produto::where('id_usuario', '=', $id_usuario)->get();
        $count_produtos = count($produtos);

        $pessoas = Pessoa::where('id_usuario', '=', $id_usuario)->get();
        $count_pessoas = count($pessoas);

        $parceiros = Parceiro::where('id_usuario', '=', $id_usuario)->get();
        $count_parceiros = count($parceiros);

        $interesses = Interesse::where('id_usuario', '=', $id_usuario)->paginate(3);

        $tarefas = Tarefa::where('id_usuario', '=', $id_usuario)->paginate(3);

        //CHART de emprestimos no mes
        $emprestimos_grafico = Emprestimo::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->where('id_usuario', '=', $id_usuario)
                    ->get();

        $grafico_emprestimos_mes = Charts::database($emprestimos_grafico, 'bar', 'highcharts')
                  ->title("Empréstimos Mensais")
                  ->elementLabel("Total Empréstimos")
                  ->dimensions(1000, 500)
                  ->responsive(true)
                  ->groupByMonth(date('Y'), true);

        //CHART de pessoas no mes
        $pessoas_grafico = Pessoa::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->where('id_usuario', '=', $id_usuario)
                    ->get();

        $grafico_pessoas_mes = Charts::database($pessoas_grafico, 'pie', 'highcharts')
                  ->title("Pessoas Mensais")
                  ->elementLabel("Total Pessoas")
                  ->dimensions(1000, 500)
                  ->responsive(true)
                  ->groupByMonth(date('Y'), true);


        return view('home', compact('count_emprestimos', 'count_produtos', 'count_pessoas', 'count_parceiros', 'interesses', 'tarefas', 'grafico_emprestimos_mes', 'grafico_pessoas_mes'));
    }

    public function storeInteresse(Request $request)
    {
        $id_usuario = Auth::id();

        $request->validate([
            'nome'       => 'required',
            'telefone'   => 'required',
            'interesse'  => 'required',
        ]);

        Interesse::create([
            'nome'          => $request->get('nome'),
            'telefone'      => $request->get('telefone'),
            'interesse'     => $request->get('interesse'),
            'id_usuario'    => $id_usuario,
        ]);

        return redirect()->route('home')
                        ->with('success', 'Interesse cadastrado com sucesso!');
    }

    public function destroyInteresse(Interesse $interesse)
    {
        $interesse->delete();

        return redirect()->route('home')
                        ->with('success', 'Interesse deletado com sucesso!');
    }

    public function updateInteresse(Request $request, Interesse $interesse)
    {
        $id_usuario = Auth::id();

        $request->validate([
            'nome'       => 'required',
            'telefone'   => 'required',
            'interesse'  => 'required',
        ]);

        $interesse->update([
            'nome'          => $request->get('nome'),
            'telefone'      => $request->get('telefone'),
            'interesse'     => $request->get('interesse'),
            'id_usuario'    => $id_usuario,
        ]);

        return redirect()->route('home')
                        ->with('success', 'Interesse atualizado com sucesso!');
    }

    public function storeTarefa(Request $request)
    {
        $id_usuario = Auth::id();

        $request->validate([
            'tarefa'  => 'required',
            'prazo'   => 'required',
        ]);

        Tarefa::create([
            'tarefa'        => $request->get('tarefa'),
            'prazo'         => $request->get('prazo'),
            'id_usuario'    => $id_usuario,
        ]);

        return redirect()->route('home')
                        ->with('success', 'Tarefa cadastrada com sucesso!');
    }

    public function destroyTarefa(Tarefa $tarefa)
    {
        $tarefa->delete();

        return redirect()->route('home')
                        ->with('success', 'Tarefa deletada com sucesso!');
    }

    public function updateTarefa(Request $request, Tarefa $tarefa)
    {
        $id_usuario = Auth::id();

        $request->validate([
            'tarefa'  => 'required',
            'prazo'   => 'required',
        ]);

        $tarefa->update([
            'tarefa'        => $request->get('tarefa'),
            'prazo'         => $request->get('prazo'),
            'id_usuario'    => $id_usuario,
        ]);

        return redirect()->route('home')
                        ->with('success', 'Tarefa atualizada com sucesso!');
    }
}