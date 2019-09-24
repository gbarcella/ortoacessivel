@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Editar Usuário</h1>
@stop

@section('content')
    
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ooops!</strong> Ocorreram alguns problemas com os campos.<br><br>
         <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> 
    </div>
@endif

<div class="box box-primary" style="padding: 10px;">

<form action="{{ route('users.update', $user->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="input_nome">Nome</label>
      <input type="text" class="form-control" id="input_nome" name="nome" placeholder="Nome" value="{{ $user->name }}" required>
    </div>
    <div class="form-group col-md-6">
      <label for="input_email">Email</label>
      <input type="email" class="form-control" id="input_email" name="email" placeholder="Email" value="{{ $user->email }}" required>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="input_role">Papel</label>
      <select id="input_role" name="papel" class="form-control" required>
        <option selected value="{{ $user->role }}">{{ $user->role }}</option>
        <option value="admin">Admin</option>
        <option value="standard">Standard</option>
      </select>
    </div>

    <div class="form-group col-md-7">
      <label for="input_senha">Senha</label>
      <input type="password" class="form-control" id="input_senha" name="senha" value="$user->password" required>
    </div>
  </div>


    <button type="submit" class="btn btn-primary">Cadastrar</button>
 
</form>

</div>

@stop