@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    
    @if ($message = Session::get('success'))
    	<div class="alert alert-success">
    		<p>{{ $message }}</p>
    	</div>
    @endif

    @if ($message = Session::get('failed'))
      <div class="alert alert-danger">
        <p>{{ $message }}</p>
      </div>
    @endif
    <div class="box box-primary" style="padding: 10px;">

    <div class="row">
    	<div class="col-md-4">
    		<a class="btn btn-default" style="width: 100%; background-color: #605CA8; color: #fff;" href="{{ route('produtos.create') }}"> Novo Produto </a>
    	</div>

      <div class="col-md-8">
        <form action="/search-produto" method="get">
        <div class="input-group col-md-12">
          <input type="text" class="form-control input" name="search" placeholder="Buscar" />
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      </div>
      </div>
    

    <br/>

    <div class="table-responsive">

  <table class="table " >
    <thead style="background-color: #605CA8; color: #fff;">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Status</th>
        <th scope="col">Estado</th>
        <th width="150px">Ações</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($produtos as $p)
        @php
        if($p->status == "Indisponivel")
        {
          echo $tr_pendente; 
        } else {
          echo $tr_nao_pendente;
        }
      @endphp
          <td>{{ $p->codigo_identificacao }}</td>
          <td>{{ $p->nome }}</td>
          <td>{{ $p->status }}</td>
          <td>{{ $p->estado }}</td>
          <td>
            <form action="{{ route('produtos.destroy', $p->id)}}" method="POST">
            <a class="btn btn-info" href="{{ route('produtos.show',$p->id) }}"><i class="fa fa-search"></i></a>     
            <a class="btn btn-primary" href="{{ route('produtos.edit',$p->id) }}"><i class="fa fa-edit"></i></a> 
            
            @csrf
            @method('DELETE')     
            <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar o registro?')"><i class="fa fa-trash"></i></a></button>
            </form>
          </td>
        </tr>

        @empty
          <tr>
          <td>Não há registros</td>
         </tr>
   		
      @endforelse
    </tbody>
  </table>
</div>

</div>

{!! $produtos->links() !!}
@stop