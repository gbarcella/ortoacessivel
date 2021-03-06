@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Novo Produto</h1>
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


<form action="{{ route('produtos.update', $produto->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="input_identificacao">Código de Identificação</label>
      <input type="text" class="form-control" id="input_identificacao" name="identificacao" placeholder="Código" value="{{ $produto->codigo_identificacao }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_nome">Nome</label>
      <input type="text" class="form-control" id="input_nome" name="nome" placeholder="Nome" value="{{ $produto->nome }}" required>
    </div>

    <div class="form-group col-md-4">
      <label for="input_status">Status</label>
      <select id="input_status" name="status" class="form-control" required>
        <option selected value="{{ $produto->status }}">{{ $produto->status }}</option>
        <option value="Disponivel">Disponivel</option>
        <option value="Indisponivel">Indisponivel</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="input_marca">Marca</label>
      <input type="text" class="form-control" id="input_marca" name="marca" placeholder="Marca" value="{{ $produto->marca }}">
    </div>
    <div class="form-group col-md-6">
      <label for="input_modelo">Modelo</label>
      <input type="text" class="form-control" id="input_modelo" name="modelo" placeholder="Modelo" value="{{ $produto->modelo }}">
    </div>
  </div>
 
  <div class="form-row">

    <div class="form-group col-md-3">
      <label for="input_data_recebimento">Data de recebimento</label>
      <input type="date" class="form-control" id="input_data_recebimento" name="recebimento" placeholder="Data de Recebimento" value="{{ $produto->data_recebimento }}" required>
    </div>

  	<div class="form-group col-md-3">
      <label for="input_estado">Estado</label>
      <select id="input_estado" name="estado" class="form-control" required>
        <option selected value="{{ $produto->estado }}">{{ $produto->estado }}</option>
        <option value="Novo">Novo</option>
        <option value="Semi-novo">Semi-novo</option>
        <option value="Usado">Usado</option>
        <option value="Muito usado">Muito usado</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="input_procedencia">Procedência</label>
      <select id="input_procedencia" class="form-control" name="procedencia" required>
      	<option selected value="{{ $produto->procedencia }}">{{ $produto->procedencia }}</option>
        <option value="Doação">Doação</option>
        <option value="Compra">Compra</option>
        <option value="Criado">Criado</option>
      </select>
    </div>

    <div class="form-group col-md-3">
      <label for="input_parceiro">Parceiro</label>
      <select id="input_parceiro" class="form-control" name="parceiro" required>
        <option selected value="{{ $produto->id_parceiro }}">@php echo $parceiro @endphp</option>
         @foreach($parceiros as $p)
          
          @if($p->nome != $parceiro)
            <option value="{{ $p->id }}">
              {{ $p->nome }}
            </option>
          @endif

        @endforeach
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="input_descricao">Descrição</label>
      <textarea class="form-control" id="input_descricao" name="descricao" placeholder="Descrição" required>{{ $produto->descricao }}</textarea>
    </div>
  </div>

 
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  
</form>

</div>

@stop