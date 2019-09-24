@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Editar Pessoa</h1>
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

<form action="{{ route('pessoas.update', $pessoa->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="input_nome">Nome</label>
      <input type="text" class="form-control" id="input_nome" name="nome" placeholder="Nome" value="{{ $pessoa->nome }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_sobrenome">Sobrenome</label>
      <input type="text" class="form-control" id="input_sobrenome" name="sobrenome" placeholder="Sobrenome" value="{{ $pessoa->sobrenome }}" required>
    </div>
    <div class="form-group col-md-3">
      <label for="input_nascimento">Nascimento</label>
      <input type="date" class="form-control" id="input_nascimento" name="nascimento" placeholder="Nascimento" value="{{ $pessoa->nascimento }}" required>
    </div>
  </div>

  <div class="form-row">
  	<div class="form-group col-md-3">
      <label for="input_sexo">Sexo</label>
      <select id="input_sexo" name="sexo" class="form-control" required>
        <option selected value="{{ $pessoa->sexo }}">{{ $pessoa->sexo }}</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        <option value="Outro">Outro</option>
      </select>
    </div>
    <div class="form-group col-md-5">
      <label for="input_cpf">CPF</label>
      <input type="text" class="form-control" id="input_cpf" name="cpf" placeholder="CPF" value="{{ $pessoa->cpf }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_renda">Renda</label>
      <input type="text" class="form-control" id="input_renda" name="renda" placeholder="Renda" value="{{ $pessoa->renda }}" required>
    </div>
  </div>

  <div class="form-row">
  	<div class="form-group col-md-4">
      <label for="input_email">Email</label>
      <input type="email" class="form-control" id="input_email" name="email" placeholder="Email" value="{{ $pessoa->email }}">
    </div>
    <div class="form-group col-md-4">
      <label for="input_telefone">Telefone</label>
      <input type="text" class="form-control input_telefone" id="input_telefone" name="telefone" placeholder="Telefone" value="{{ $pessoa->telefone }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_telefone2">Telefone 2</label>
      <input type="text" class="form-control input_telefone" id="input_telefone2" name="telefone2" placeholder="Telefone 2" value="{{ $pessoa->telefone2 }}">
    </div>
  </div>
 
  <div class="form-row">
  	

    <div class="form-group col-md-6">
      <label for="input_estado">Estado</label>
      <select id="estado" class="form-control" name="estado" value="{{ $pessoa->estado }}" required>
      	
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="input_cidade">Cidade</label>
      <select id="cidade" name="cidade" class="form-control" value="{{ $pessoa->cidade }}" required>

      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="input_endereço">Endereço</label>
      <input type="text" class="form-control" id="input_endereço" name="endereco" placeholder="Endereço" value="{{ $pessoa->endereco }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_bairro">Bairro</label>
      <input type="text" class="form-control" id="input_bairro" name="bairro" placeholder="Bairro" value="{{ $pessoa->bairro }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_numero">Número</label>
      <input type="number" class="form-control" id="input_numero" name="numero" placeholder="Número" value="{{ $pessoa->numero }}" required>
    </div>
  </div>

    <button type="submit" class="btn btn-primary">Editar</button>
</form>

</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">
	window.onload = function() { 
		new dgCidadesEstados({ 
			estado: document.getElementById('estado'), 
			cidade: document.getElementById('cidade'),
		}); 
	}

  $(document).ready(function($){
    $('.input_telefone').mask('(00) 00000-0000');
    $('#input_cpf').mask('000.000.000-00');
  });
</script>

@stop