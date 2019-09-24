<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emprestimo;
use App\Pessoa;
use App\Produto;
use Illuminate\Support\Facades\Auth;
use DB;

class EmprestimoController extends Controller
{

    public function index()
    {
        $id_usuario = Auth::id();
        
        $emprestimos = Emprestimo::where('id_usuario', '=', $id_usuario)->paginate(15);

        $tr_pendente = ' <tr style="background-color: #910d03; color: #fff">';
        $tr_nao_pendente = '<tr>';

        return view('emprestimos.index', compact('emprestimos', 'tr_pendente', 'tr_nao_pendente'));
    }

    public function create()
    {
        $id_usuario = Auth::id();

        $pessoas = Pessoa::where('id_usuario', '=', $id_usuario)->paginate(1000000);

        $produtos = Produto::where('id_usuario', '=', $id_usuario)->paginate(1000000)->where('status', '!=', 'Indisponivel');

        return view('emprestimos.create', compact('pessoas', 'produtos'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'pessoa'        => 'required',
            'produto'       => 'required',
            'datainicio'    => 'required',
            'datadevolucao' => 'required',
            'status'        => 'required',
        ]);

        $id_usuario = Auth::id();

        Emprestimo::create([
            'id_pessoa'            => $request->get('pessoa'),
            'id_produto'           => $request->get('produto'),
            'data_inicio'       => $request->get('datainicio'),
            'data_devolucao'    => $request->get('datadevolucao'),
            'status'            => $request->get('status'),
            'observacoes'       => $request->get('observacoes'),
            'id_usuario'        => $id_usuario,
        ]);

        $id_produto = $request->get('produto');

        $sitaucaoIndisponivel = "Indisponivel";

        $produto = DB::table('produtos')->where('id', '=', $id_produto)->update(['status' => $sitaucaoIndisponivel]);


        return redirect()->route('emprestimos.index')
                        ->with('success', 'Empréstimo cadastrado com sucesso!');
    }

    public function search(Request $request)
    {
        $id_usuario = Auth::id();
        
        $search = $request->get('search');

        $emprestimos = DB::table('emprestimos')->where('data_inicio', 'like', '%'.$search.'%')
                                        ->where('id_usuario', '=', $id_usuario)
                                        ->paginate(5);
                                        
        $emprestimos_count = count($emprestimos);

        $tr_pendente = ' <tr style="background-color: #910d03; color: #fff">';
        $tr_nao_pendente = '<tr>';

        if($emprestimos_count != 0)
        {
            return view('emprestimos.index', compact('emprestimos', 'tr_pendente', 'tr_nao_pendente'));
        }
        else {
            return redirect()->route('emprestimos.index')
                        ->with('failed', 'Não há registros no banco de dados!');
        }

    }

    public function show(Emprestimo $emprestimo)
    {
        $id_usuario = Auth::id();
        
        $pessoa = Emprestimo::pessoaDoEmprestimo($emprestimo);

        $produto = Emprestimo::produtoDoEmprestimo($emprestimo);

        return view('emprestimos.show', compact('emprestimo','produto', 'pessoa'));
    }

    public function edit(Emprestimo $emprestimo)
    {
        $id_usuario = Auth::id();

        $produtos = Produto::where('id_usuario', '=', $id_usuario)->paginate(1000000)->where('status', '!=', 'Indisponivel');

        $produto = Emprestimo::produtoDoEmprestimo($emprestimo);

        $pessoas = Pessoa::where('id_usuario', '=', $id_usuario)->paginate(1000000);

        $pessoa = Emprestimo::pessoaDoEmprestimo($emprestimo);

        return view('emprestimos.edit', compact('emprestimo', 'produtos', 'produto', 'pessoas', 'pessoa'));
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $request->validate([
            'pessoa'        => 'required',
            'produto'       => 'required',
            'datainicio'    => 'required',
            'datadevolucao' => 'required',
            'status'        => 'required',
        ]);

        $id_produto_antigo = $emprestimo->id_produto;

        $sitaucaoDisponivel = "Disponivel";

        $produto_antigo = DB::table('produtos')->where('id', '=', $id_produto_antigo)->update(['status' => $sitaucaoDisponivel]);

        $id_usuario = Auth::id();

        $emprestimo->update([
            'id_pessoa'            => $request->get('pessoa'),
            'id_produto'           => $request->get('produto'),
            'data_inicio'       => $request->get('datainicio'),
            'data_devolucao'    => $request->get('datadevolucao'),
            'status'            => $request->get('status'),
            'observacoes'       => $request->get('observacoes'),
            'id_usuario'        => $id_usuario,
        ]);

        $id_produto = $request->get('produto');

        $sitaucaoIndisponivel = "Indisponivel";

        $produto = DB::table('produtos')->where('id', '=', $id_produto)->update(['status' => $sitaucaoIndisponivel]);

        return redirect()->route('emprestimos.index')
                        ->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $id_produto = $emprestimo->id_produto;

        $produto = DB::table('produtos')->where('id', '=', $id_produto)->update(['status' => "Disponivel"]);

        $emprestimo->delete();

        return redirect()->route('emprestimos.index')
                        ->with('success', 'Empréstimo deletado com sucesso!');
    }
}
