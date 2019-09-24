@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Empréstimos</h1>
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
    		<a class="btn btn-default" style="width: 100%; background-color: #605CA8; color: #fff;" href="{{ route('emprestimos.create') }}"> Novo Empréstimo </a>
    	</div>

      <div class="col-md-8">
        <form action="/search-emprestimos" method="get">
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

  <table class="table">
    <thead style="background-color: #605CA8; color: #fff;">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Status</th>
        <th scope="col">Início</th>
        <th scope="col">Devolução</th>
        <th width="150px">Ações</th>
      </tr>
    </thead>
    <tbody>
      

      @forelse ($emprestimos as $e)

      @php
        if($e->status == "Pendente")
        {
          echo $tr_pendente; 
        } else {
          echo $tr_nao_pendente;
        }
      @endphp
          <td>{{ $e->id }}</td>
          <td>{{ $e->status }}</td>
          <td>{{ date( 'd/m/Y' , strtotime($e->data_inicio))}}</td>
          <td>{{ date( 'd/m/Y' , strtotime($e->data_devolucao))}}</td>
          <td>
            <form action="{{ route('emprestimos.destroy', $e->id)}}" method="POST">
            <a class="btn btn-info" href="{{ route('emprestimos.show',$e->id) }}"><i class="fa fa-search"></i></a>     
            <a class="btn btn-primary" href="{{ route('emprestimos.edit',$e->id) }}"><i class="fa fa-edit"></i></a>     

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

{!! $emprestimos->links() !!}
@stop