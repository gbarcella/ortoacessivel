<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chamado;
use Illuminate\Support\Facades\Auth;
use DB;

class ChamadoController extends Controller
{
    public function index()
    {
        $id_usuario = Auth::id();

        $chamados = Chamado::where('id_usuario', $id_usuario)->paginate(15);

        return view('chamados.index', compact('chamados'));
    }

    public function destroy(Chamado $chamado)
    {
        $chamado->delete();

        return redirect()->route('chamados')
                        ->with('success', 'Chamado deletado com sucesso!');
    }

    public function searchChamadoUsuarioStandard(Request $request)
    {
        $id_usuario = Auth::id();
        
        $search = $request->get('search');
        $chamados = DB::table('chamados')->where('titulo', 'like', '%'.$search.'%')
                                        ->where('id_usuario', '=', $id_usuario)
                                        ->paginate(5);
        $chamados_count = count($chamados);


        if($chamados_count != 0) {
            return view('chamados.index', compact('chamados'));
        } else {
            return redirect()->route('chamados')
                        ->with('failed', 'Não há registros no banco de dados!');
        }
    }

    public function searchChamadoUsuarioAdminAberto(Request $request)
    {
        $search = $request->get('search');
        $chamados_abertos = Chamado::where('titulo', 'like', '%'.$search.'%')
                                         ->where('status', 'Aberto')
                                         ->paginate('5');

        $chamados_count = count($chamados_abertos);

        if( $chamados_count != 0) {
            return view('chamados.chamados-abertos', compact('chamados_abertos'));
        } else {
            return redirect()->route('chamados-abertos')
                            ->with('failed', 'Não há registros no banco de dados!');
        }
    }

    public function searchChamadoUsuarioAdminFechado(Request $request)
    {
        $search = $request->get('search');
        $chamados_concluidos = Chamado::where('titulo', 'like', '%'.$search.'%')
                                         ->where('status', 'Concluido')
                                         ->paginate('5');

        $chamados_count = count($chamados_concluidos);

        if( $chamados_count != 0) {
            return view('chamados.chamados-concluidos', compact('chamados-concluidos'));
        } else {
            return redirect()->route('chamados-concluidos')
                            ->with('failed', 'Não há registros no banco de dados!');
        }
    }

    public function chamadosAbertos()
    {
        $chamados_abertos = Chamado::where('status', 'Aberto')->paginate(15);

        return view('chamados.chamados-abertos', compact('chamados_abertos'));
    }

    public function chamadosConcluidos()
    {
        $chamados_concluidos = Chamado::where('status', 'like', '%'.'C'.'%')->paginate(15);

        return view('chamados.chamados-concluidos', compact('chamados_concluidos'));
    }
}