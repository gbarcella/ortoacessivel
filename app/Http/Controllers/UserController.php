<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{

    public function index()
    {
        $usuarios = User::paginate(5);

        return view('users.index', compact('usuarios'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'    => 'required',
            'email'   => 'required',
            'role'    => 'required',
            'senha'   => 'required',
        ]);

        User::create([
            'name'      => $request->get('nome'),
            'email'     => $request->get('email'),
            'role'      => $request->get('role'),
            'password'  => bcrypt($request->get('senha')),
        ]);

        return redirect()->route('users.index')
                        ->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $usuarios = DB::table('users')->where('name', 'like', '%'.$search.'%')
                                        ->paginate(5);
        $usuarios_count = count($usuarios);

        if($usuarios_count != 0)
        {
            return view('users.index', compact('usuarios'));
        }
        else {
            return redirect()->route('users.index')
                        ->with('failed', 'Não há registros no banco de dados!');
        }

    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nome'    => 'required',
            'email'   => 'required',
            'papel'    => 'required',
            'senha'   => 'required',
        ]);

        $user->update([
            'name'      => $request->get('nome'),
            'email'     => $request->get('email'),
            'role'      => $request->get('papel'),
            'password'  => bcrypt($request->get('senha')),
        ]);

        return redirect()->route('users.index')
                        ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success', 'Usuário deletado com sucesso!');
    }
}
