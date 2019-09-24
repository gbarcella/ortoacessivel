<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use Illuminate\Support\Facades\Auth;
use DB;

class PessoaController extends Controller
{
    public function index()
    {
        $id_usuario = Auth::id();
        
        $pessoas = Pessoa::where('id_usuario', '=', $id_usuario)->paginate(15);

        return view('pessoas.index',compact('pessoas'));
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'          => 'required',
            'sobrenome'     => 'required',
            'telefone'      => 'required',
            'nascimento'    => 'required',
            'sexo'          => 'required',
            'renda'         => 'required',
            'cpf'           => 'required',
            'estado'        => 'required',
            'cidade'        => 'required',
            'endereco'      => 'required',
            'bairro'        => 'required',
            'numero'        => 'required',
        ]);

        $id_usuario = Auth::id();

        Pessoa::create([
            'nome'            => $request->get('nome'),
            'sobrenome'       => $request->get('sobrenome'),
            'telefone'        => $request->get('telefone'),
            'telefone2'       => $request->get('telefone2'),
            'nascimento'      => $request->get('nascimento'),
            'email'           => $request->get('email'),
            'sexo'            => $request->get('sexo'),
            'renda'           => $request->get('renda'),
            'cpf'             => $request->get('cpf'),
            'estado'          => $request->get('estado'),
            'cidade'          => $request->get('cidade'),
            'endereco'        => $request->get('endereco'),
            'bairro'          => $request->get('bairro'),
            'numero'          => $request->get('numero'),
            'id_usuario'      => $id_usuario,
        ]);

        return redirect()->route('pessoas.index')
                        ->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function search(Request $request)
    {
        $id_usuario = Auth::id();
        
        $search = $request->get('search');

        $pessoas = DB::table('pessoas')->where('nome', 'like', '%'.$search.'%')
                                        ->where('id_usuario', '=', $id_usuario)
                                        ->paginate(5);

        $pessoas_count = count($pessoas);

        if($pessoas_count != 0)
        {
            return view('pessoas.index', compact('pessoas'));
        }
        else {
            return redirect()->route('pessoas.index')
                        ->with('failed', 'Não há registros no banco de dados!');
        }
    }

    public function show(Pessoa $pessoa)
    {
        return view('pessoas.show', compact('pessoa'));
    }

    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $request->validate([
            'nome'          => 'required',
            'sobrenome'     => 'required',
            'telefone'      => 'required',
            'nascimento'    => 'required',
            'sexo'          => 'required',
            'renda'         => 'required',
            'cpf'           => 'required',
            'estado'        => 'required',
            'cidade'        => 'required',
            'endereco'      => 'required',
            'bairro'        => 'required',
            'numero'        => 'required',
        ]);

        $id_usuario = Auth::id();

        $pessoa->update([
            'nome'            => $request->get('nome'),
            'sobrenome'       => $request->get('sobrenome'),
            'telefone'        => $request->get('telefone'),
            'telefone2'       => $request->get('telefone2'),
            'nascimento'      => $request->get('nascimento'),
            'email'           => $request->get('email'),
            'sexo'            => $request->get('sexo'),
            'renda'           => $request->get('renda'),
            'cpf'             => $request->get('cpf'),
            'estado'          => $request->get('estado'),
            'cidade'          => $request->get('cidade'),
            'endereco'        => $request->get('endereco'),
            'bairro'          => $request->get('bairro'),
            'numero'          => $request->get('numero'),
            'id_usuario'      => $id_usuario,
        ]);

        return redirect()->route('pessoas.index')
                        ->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();

        return redirect()->route('pessoas.index')
                        ->with('success', 'Pessoa deletada com sucesso!');
    }
}