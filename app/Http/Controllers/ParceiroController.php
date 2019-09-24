<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parceiro;
use Illuminate\Support\Facades\Auth;
use DB;

class ParceiroController extends Controller
{
    public function index()
    {
        $id_usuario = Auth::id();
        
        $parceiros = Parceiro::where('id_usuario', '=', $id_usuario)->paginate(15);

        return view('parceiros.index',compact('parceiros'));
    }

    public function create()
    {
        return view('parceiros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required',
            'tipo'      => 'required',
            'telefone'  => 'required',
            'email'     => 'required',
            'estado'    => 'required',
            'cidade'    => 'required',
            'endereco'  => 'required',
            'bairro'    => 'required',
            'numero'    => 'required',
        ]);

        $id_usuario = Auth::id();

        Parceiro::create([
            'nome'            => $request->get('nome'),
            'fisica_juridica' => $request->get('tipo'),
            'telefone'        => $request->get('telefone'),
            'email'           => $request->get('email'),
            'estado'          => $request->get('estado'),
            'cidade'          => $request->get('cidade'),
            'endereco'        => $request->get('endereco'),
            'bairro'          => $request->get('bairro'),
            'numero'          => $request->get('numero'),
            'id_usuario'      => $id_usuario,
        ]);

        return redirect()->route('parceiros.index')
                        ->with('success', 'Parceiro cadastrado com sucesso!');

    }

    public function search(Request $request)
    {
        $id_usuario = Auth::id();
        
        $search = $request->get('search');
        $parceiros = DB::table('parceiros')->where('nome', 'like', '%'.$search.'%')
                                        ->where('id_usuario', '=', $id_usuario)
                                        ->paginate(5);
        $parceiros_count = count($parceiros);

        if($parceiros_count != 0)
        {
            return view('parceiros.index', compact('parceiros'));
        }
        else {
            return redirect()->route('parceiros.index')
                        ->with('failed', 'Não há registros no banco de dados!');
        }

    }

    public function show(Parceiro $parceiro)
    {
        return view('parceiros.show', compact('parceiro'));
    }

    public function edit(Parceiro $parceiro)
    {
        return view('parceiros.edit', compact('parceiro'));
    }

    public function update(Request $request, Parceiro $parceiro)
    {
        $request->validate([
            'nome'      => 'required',
            'tipo'      => 'required',
            'telefone'  => 'required',
            'email'     => 'required',
            'estado'    => 'required',
            'cidade'    => 'required',
            'endereco'  => 'required',
            'bairro'    => 'required',
            'numero'    => 'required',
        ]);

        $id_usuario = Auth::id();

        $parceiro->update([
            'nome'            => $request->get('nome'),
            'fisica_juridica' => $request->get('tipo'),
            'telefone'        => $request->get('telefone'),
            'email'           => $request->get('email'),
            'estado'          => $request->get('estado'),
            'cidade'          => $request->get('cidade'),
            'endereco'        => $request->get('endereco'),
            'bairro'          => $request->get('bairro'),
            'numero'          => $request->get('numero'),
            'id_usuario'      => $id_usuario,
        ]);

        return redirect()->route('parceiros.index')
                        ->with('success', 'Parceiro atualizado com sucesso!');
    }

    public function destroy(Parceiro $parceiro)
    {
        $parceiro->delete();

        return redirect()->route('parceiros.index')
                        ->with('success', 'Parceiro deletado com sucesso!');
    }
}
