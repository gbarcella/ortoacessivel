@extends('adminlte::page')

@section('', '')

@section('content_header')
<h1>Editar Chamado</h1>
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

    <form action="{{ route('update-chamado-aberto', $chamado->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="input_nome">Nome</label>
          <input type="text" class="form-control" id="input_nome" name="titulo" placeholder="Nome" value="{{ $chamado->titulo }}" required>
        </div>
        
       
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="input_email">Descricao</label>
        <textarea type="text" class="form-control" id="input_email" name="descricao" placeholder="Email" maxlength="191" required>{{$chamado->descricao}}</textarea>
          </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="input_tipo">Tipo</label>
            <select id="input_tipo" name="prioridade" class="form-control" required>
              <option selected value="{{ $chamado->prioridade }}">{{ $chamado->prioridade }}</option>
              <option value="Urgente">Urgente</option>
              <option value="Mediana">Mediana</option>
              <option value="Leve">Leve</option>
            </select>
          </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="input_status">Tipo</label>
            <select id="input_status" class="form-control" name="status" required>
              <option selected value="{{ $chamado->status }}">{{$chamado->status}}</option>
              <option value="Concluido">Concluído</option>
            </select>
          </div>
      </div>
     
    
        <button type="submit" class="btn btn-primary">Atualizar</button>
      
    </form>
    </div>
@stop