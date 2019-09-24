@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Novo Empréstimo</h1>
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

<form action="{{ route('emprestimos.store') }}" method="POST">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="input_pessoa">Pessoa</label>
      <select id="input_pessoa" class="form-control" name="pessoa" required>
        <option selected disabled>Escolha...</option>
         @foreach($pessoas as $p)
          
            <option value="{{ $p->id }}">
              {{ $p->nome }}
            </option>

        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="input_produto">Produto</label>
      <select id="input_produto" class="form-control" name="produto" required>
        <option selected disabled>Escolha...</option>
         @foreach($produtos as $pr)
          
            <option value="{{ $pr->id }}">
              {{ $pr->nome }}
            </option>

        @endforeach
      </select>
    </div>
  </div>

  <div class="form-row">
  	 <div class="form-group col-md-4">
      <label for="input_data_inicio">Data de início</label>
      <input type="date" class="form-control" id="input_data_inicio" name="datainicio" placeholder="Data de Início" required>
    </div>
     <div class="form-group col-md-4">
      <label for="input_data_devolucao">Data de devolução</label>
      <input type="date" class="form-control" id="input_data_devolucao" name="datadevolucao" placeholder="Data de Recebimento" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_status">Status</label>
      <select id="input_status" name="status" class="form-control" required>
        <option selected disabled>Escolha...</option>
        <option value="Em andamento">Em andamento</option>
        <option value="Concluído">Concluído</option>
        <option value="Pendente">Pendente</option>
      </select>
    </div>
  </div>

   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="input_observacoes">Observações</label>
      <textarea class="form-control" id="input_observacoes" name="observacoes" placeholder="Observações"></textarea>
    </div>
  </div>


    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

</div>

@stop