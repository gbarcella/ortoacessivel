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

<form action="{{ route('emprestimos.update', $emprestimo->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="input_pessoa">Pessoa</label>
      <select id="input_pessoa" class="form-control" name="pessoa" required>
        <option selected value="{{ $emprestimo->id_pessoa }}">@php echo $pessoa->nome @endphp</option>

         @foreach($pessoas as $p)

          @if($p->nome != $pessoa->nome)
            <option value="{{ $p->id }}">
              {{ $p->nome }}
            </option>
          @endif

        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="input_produto">Produto</label>
      <select id="input_produto" class="form-control" name="produto" required>
        <option selected value="{{ $emprestimo->id_produto }}">@php echo $produto->nome @endphp</option>
         @foreach($produtos as $pr)
          
          @if($pr->nome != $produto->nome)
            <option value="{{ $pr->id }}">
              {{ $pr->nome }}
            </option>
          @endif
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-row">
     <div class="form-group col-md-4">
      <label for="input_data_inicio">Data de início</label>
      <input type="date" class="form-control" id="input_data_inicio" name="datainicio" value="{{ $emprestimo->data_inicio }}" required>
    </div>
     <div class="form-group col-md-4">
      <label for="input_data_devolucao">Data de devolução</label>
      <input type="date" class="form-control" id="input_data_devolucao" name="datadevolucao" value="{{ $emprestimo->data_devolucao }}" required>
    </div>
    <div class="form-group col-md-4">
      <label for="input_status">Status</label>
      <select id="input_status" name="status" class="form-control" required>
        <option selected value="{{ $emprestimo->status }}">{{ $emprestimo->status }}</option>
        <option value="Em andamento">Em andamento</option>
        <option value="Concluído">Concluído</option>
        <option value="Pendente">Pendente</option>
      </select>
    </div>
  </div>

   <div class="form-row">
    <div class="form-group col-md-12">
      <label for="input_observacoes">Observações</label>
      <textarea class="form-control" id="input_observacoes" name="observacoes" placeholder="Observações">
        {{ $emprestimo->observacoes }}
      </textarea>
    </div>
  </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

</div>

@stop