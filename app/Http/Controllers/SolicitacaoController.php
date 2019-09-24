<?php

namespace App\Http\Controllers;

use App\Solicitacao;
use DB;

class SolicitacaoController extends Controller
{
    public function index()
    {
        $solicitacoes = DB::table('solicitacoes')->paginate(15);

        return view('solicitacoes.index', compact('solicitacoes'));
    }

    public function destroy(Solicitacao $solicitacao)
    {
        $solicitacao->delete();

        return redirect()->route('solicitacoes')
                        ->with('success', 'Solicitação deletada com sucesso!');
    }
}