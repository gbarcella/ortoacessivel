<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Parceiro;
use Illuminate\Support\Facades\Auth;
use DB;

class ProdutoController extends Controller
{
    public function index()
    {
        $id_usuario = Auth::id();
        
        $produtos = Produto::where('id_usuario', '=', $id_usuario)->paginate(15);

        $tr_pendente = ' <tr style="background-color: #910d03; color: #fff">';
        $tr_nao_pendente = '<tr>';

        return view('produtos.index', compact('produtos', 'tr_pendente', 'tr_nao_pendente'));
    }

    public function create()
    {
        $id_usuario = Auth::id();

        $parceiros = Parceiro::where('id_usuario', '=', $id_usuario)->paginate(1000000);
        
        return view('produtos.create', compact('parceiros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'identificacao'     => 'required',
            'nome'              => 'required',
            'recebimento'       => 'required',
            'estado'            => 'required',
            'procedencia'       => 'required',
            'parceiro'          => 'required',
            'descricao'         => 'required',
        ]);

        $id_usuario = Auth::id();

        Produto::create([
            'codigo_identificacao'  => $request->get('identificacao'),
            'nome'                  => $request->get('nome'),
            'data_recebimento'      => $request->get('recebimento'),
            'estado'                => $request->get('estado'),
            'status'                => $request->get('status'),
            'procedencia'           => $request->get('procedencia'),
            'id_parceiro'           => $request->get('parceiro'),
            'descricao'             => $request->get('descricao'),
            'id_usuario'            => $id_usuario,
        ]);

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function search(Request $request)
    {
        $id_usuario = Auth::id();
        
        $search = $request->get('search');
        $produtos = DB::table('produtos')->where('codigo_identificacao', 'like', '%'.$search.'%')
                                        ->where('id_usuario', '=', $id_usuario)
                                        ->paginate(5);
        $produtos_count = count($produtos);

        $tr_pendente = ' <tr style="background-color: #910d03; color: #fff">';
        $tr_nao_pendente = '<tr>';

        if($produtos_count != 0)
        {
            return view('produtos.index', compact('produtos', 'tr_pendente', 'tr_nao_pendente'));
        }
        else {
            return redirect()->route('produtos.index')
                        ->with('failed', 'Não há registros no banco de dados!');
        }

    }

    public function show(Produto $produto)
    {
        $id_usuario = Auth::id();
        
        $parceiro = DB::table('parceiros')->where('id_usuario', $id_usuario)
                                            ->where('id', $produto->id_parceiro)
                                            ->value('nome');

        return view('produtos.show', compact('produto', 'parceiro'));
    }

    public function edit(Produto $produto)
    {
        $id_usuario = Auth::id();

        $parceiros = Parceiro::where('id_usuario', '=', $id_usuario)->paginate(1000000);

        $parceiro = DB::table('parceiros')->where('id_usuario', $id_usuario)
                                            ->where('id', $produto->id_parceiro)
                                            ->value('nome');

        return view('produtos.edit', compact('produto', 'parceiros', 'parceiro'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'identificacao'     => 'required',
            'nome'              => 'required',
            'recebimento'       => 'required',
            'estado'            => 'required',
            'procedencia'       => 'required',
            'parceiro'          => 'required',
            'descricao'         => 'required',
        ]);

        $id_usuario = Auth::id();

        $produto->update([
            'codigo_identificacao'  => $request->get('identificacao'),
            'nome'                  => $request->get('nome'),
            'data_recebimento'      => $request->get('recebimento'),
            'estado'                => $request->get('estado'),
            'status'                => $request->get('status'),
            'procedencia'           => $request->get('procedencia'),
            'id_parceiro'           => $request->get('parceiro'),
            'descricao'             => $request->get('descricao'),
            'id_usuario'            => $id_usuario,
        ]);

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto deletado com sucesso!');
    }
}
