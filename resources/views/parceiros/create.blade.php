@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Novo Parceiro</h1>
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

<form action="{{ route('parceiros.store') }}" method="POST">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="input_nome">Nome</label>
      <input type="text" class="form-control" id="input_nome" name="nome" placeholder="Nome" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_email">Email</label>
      <input type="email" class="form-control" id="input_email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group col-md-3">
      <label for="input_telefone">Telefone</label>
      <input type="text" class="form-control input_telefone" id="input_telefone" name="telefone" placeholder="Telefone" required>
    </div>
  </div>
 
  <div class="form-row">
  	<div class="form-group col-md-3">
      <label for="input_tipo">Tipo</label>
      <select id="input_tipo" name="tipo" class="form-control" required>
        <option selected disabled>Escolha...</option>
        <option value="Fisica">Fisica</option>
        <option value="Juridica">Juridica</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="input_estado">Estado</label>
      <select id="estado" class="form-control" name="estado" required="">
      	
      </select>
    </div>

    <div class="form-group col-md-5">
      <label for="input_cidade">Cidade</label>
      <select id="cidade" name="cidade" class="form-control" required>

      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="input_endereço">Endereço</label>
      <input type="text" class="form-control" id="input_endereço" name="endereco" placeholder="Endereço" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_bairro">Bairro</label>
      <input type="text" class="form-control" id="input_bairro" name="bairro" placeholder="Bairro" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_numero">Número</label>
      <input type="number" class="form-control" id="input_numero" name="numero" placeholder="Número" required>
    </div>
  </div>

 
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  
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
  });

</script>

@stop