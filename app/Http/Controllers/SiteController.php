<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Interesse;
use App\Solicitacao;
use App\Emprestimo;
use App\Produto;
use App\Pessoa;

class SiteController extends Controller
{
    public function index()
    {
        $orgaos = User::where('role', '!=', 'admin')->get();

        $emprestimos = Emprestimo::all();
        $count_emprestimos = count($emprestimos);

        $produtos = Produto::all();
        $count_produtos = count($produtos);

        $pessoas = Pessoa::all();
        $count_pessoas = count($pessoas);

        return view('welcome', compact('orgaos', 'count_emprestimos', 'count_produtos', 'count_pessoas'));
    }

    public function storeInteresse(Request $request) 
    {
        $request->validate([
            'nome1'      => 'required',
            'telefone1'  => 'required',
            'interesse'  => 'required',
            'orgao'      => 'required',
        ]);

        Interesse::create([
            'id_usuario'    => $request->get('orgao'),
            'nome'          => $request->get('nome1'),
            'telefone'      => $request->get('telefone1'),
            'interesse'     => $request->get('interesse')
        ]);
        
        return redirect()->route('/')
                        ->with('success_interesse', 'Interesse cadastrado com sucesso!');
    }

    public function storeSolicitacao(Request $request)
    {
        $request->validate([
            'nome2'      => 'required',
            'telefone2'  => 'required',
            'email2'     => 'required',
            'mensagem2'  => 'required',
        ]);

        Solicitacao::create([
            'nome'      => $request->get('nome2'),
            'telefone'  => $request->get('telefone2'),
            'email'     => $request->get('email2'),
            'mensagem'  => $request->get('mensagem2'),
        ]);

        return redirect()->route('/')
                        ->with('succcess_solitacao', 'Solicitação cadastrada com sucesso!');
    }
}