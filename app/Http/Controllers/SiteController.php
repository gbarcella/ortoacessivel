<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Interesse;
use App\Solicitacao;

class SiteController extends Controller
{
    public function index()
    {
        $orgaos = User::where('role', '!=', 'admin')->get();

        return view('welcome', compact('orgaos'));
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
                        ->with('success', 'Interesse cadastrado com sucesso!');
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
                        ->with('success', 'Solicitação cadastrada com sucesso!');
    }
}