@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
    
    	<div class="row">
    		<div class="col-md-3">
          <a href="/emprestimos">
    			<div class="info-box">
 	 				<!-- Apply any bg-* class to to the icon to color it -->
  					<span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
  					
  					<div class="info-box-content">
    					<span class="info-box-text">Empréstimos</span>
    					<span class="info-box-number">{{$count_emprestimos}}</span>
    					<hr>
  					</div>
  					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
      </a>
    		</div>
        

    		<div class="col-md-3">
          <a href="/emprestimos">
    			<div class="info-box">
 	 				<!-- Apply any bg-* class to to the icon to color it -->
  					<span class="info-box-icon bg-blue"><i class="fa fa-cube"></i></span>
  					
  					<div class="info-box-content">
    					<span class="info-box-text">Produtos</span>
    					<span class="info-box-number">{{$count_produtos}}</span>
    					<hr>
  					</div>
  					<!-- /.info-box-content -->
          </a>
				</div>
				<!-- /.info-box -->
    		</div>

    		<div class="col-md-3">
          <a href="/pessoas">
    			<div class="info-box">
 	 				<!-- Apply any bg-* class to to the icon to color it -->
  					<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
  					
  					<div class="info-box-content">
    					<span class="info-box-text">Pessoas</span>
    					<span class="info-box-number">{{$count_pessoas}}</span>
    					<hr>
  					</div>
  					<!-- /.info-box-content -->
          </a>
				</div>
				<!-- /.info-box -->
    		</div>

    		<div class="col-md-3">
          <a href="/parceiros">
    			<div class="info-box">
 	 				<!-- Apply any bg-* class to to the icon to color it -->
  					<span class="info-box-icon bg-yellow"><i class="fa fa-heart"></i></span>
  					
  					<div class="info-box-content">
    					<span class="info-box-text">Parceiros</span>
    					<span class="info-box-number">{{$count_parceiros}}</span>
    					<hr>
  					</div>
  					<!-- /.info-box-content -->
          </a>
				</div>
				<!-- /.info-box -->
    		</div>
    	</div>

<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de Interesse</h3>
        <div class="box-tools pull-right">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-new"><i class="fa fa-plus"></i></button>  
        </div>
        <!-- /.box-tools -->
      </div>

      <div class="modal fade" id="modal-new"  role="dialog" aria-labelledby="modal-new" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="modal-new">Novo cadastro de interesse</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <form action="/store-interesse" method="POST">
            @csrf

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_nome">Nome</label>
                <input type="text" class="form-control" id="input_nome" name="nome" placeholder="Nome" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_telefone">Telefone</label>
                <input type="text" class="form-control input_telefone" id="input_telefone" name="telefone" placeholder="Telefone" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_interesse">Interesse</label>
                <input type="text" class="form-control" id="input_interesse" name="interesse" placeholder="Interesse" required>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
          </div>

          
        </div>
      </div>
    </div>
      
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">

  <table class="table " >
    <thead style="background-color: #605CA8; color: #fff;">
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Interesse</th>
        <th width="100px">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($interesses as $i)
        <tr>
          <td>{{ $i->nome }}</td>
          <td>{{ $i->telefone }}</td>
          <td>{{ $i->interesse }}</td>
          <td>
          <form action="{{ route('destroy-interesse', $i->id) }}" method="POST">  
            <a class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $i->id ?>"><i class="fa fa-edit"></i></a>  

            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar o registro?')"><i class="fa fa-trash"></i></a></button>
            </form>
          </td>
        </tr>


    <div class="modal fade" id="modal-edit<?php echo $i->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Editar interesse</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <form action="{{ route('update-interesse', $i->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_nome">Nome</label>
                <input type="text" class="form-control" id="input_nome" name="nome" placeholder="Nome" value="{{ $i->nome }}" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_telefone">Telefone</label>
                <input type="text" class="form-control" id="input_telefone" name="telefone" placeholder="Telefone" value="{{ $i->telefone }}" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_interesse">Interesse</label>
                <input type="text" class="form-control" id="input_interesse" name="interesse" placeholder="Interesse" value="{{ $i->interesse }}" required>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
          </div>

          
        </div>
      </div>
    </div>
     @endforeach
    </tbody>
  </table>

      </div>
      
      <!-- /.box-body -->
      <div class="box-footer">
        {!! $interesses->links() !!}
      </div>
      <!-- box-footer -->
    </div>
    <!-- /.box -->
  </div>

</div>

<div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista Rápida de Tarefas</h3>
        <div class="box-tools pull-right">
          <!-- Buttons, labels, and many other things can be placed here! -->
          <!-- Here is a label for example -->
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-new-tarefa"><i class="fa fa-plus"></i></button>  
        </div>
        <!-- /.box-tools -->
      </div>

      <div class="modal fade" id="modal-new-tarefa"  role="dialog" aria-labelledby="modal-new" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="modal-new">Novo cadastro de tarefa</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <form action="/store-tarefa" method="POST">
            @csrf

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_tarefa">Tarefa</label>
                <input type="text" class="form-control" id="input_tarefa" name="tarefa" placeholder="Tarefa" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_prazo">Prazo</label>
                <input type="date" class="form-control" id="input_prazo" name="prazo" placeholder="Prazo" required>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
          </div>

          
        </div>
      </div>
    </div>
      
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">

      <table class="table " >
    <thead style="background-color: #605CA8; color: #fff;">
      <tr>
        <th scope="col">Tarefa</th>
        <th scope="col">Prazo</th>
        <th width="100px">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tarefas as $t)
        <tr>
          <td>{{ $t->tarefa }}</td>
          <td>{{ date( 'd/m/Y' , strtotime($t->prazo))}}</td>
          <td>  
            <form action="{{ route('destroy-tarefa', $t->id) }}" method="POST">
            <a class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-tarefa<?php echo $t->id ?>"><i class="fa fa-edit"></i></a>

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar o registro?')"><i class="fa fa-trash"></i></a></button>
            </form>
          </td>
        </tr>

    <div class="modal fade" id="modal-edit-tarefa<?php echo $t->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Editar tarefa</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <form action="{{ route('update-tarefa', $t->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_tarefa">Tarefa</label>
                <input type="text" class="form-control" id="input_tarefa" name="tarefa" placeholder="Nome" value="{{ $t->tarefa }}" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="input_prazo">Prazo</label>
                <input type="date" class="form-control" id="input_prazo" name="prazo" placeholder="Prazo" value="{{ $t->prazo }}" required>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </form>
          </div>

          
        </div>
      </div>
    </div>
     @endforeach
    </tbody>
  </table>

      </div>
      
      <!-- /.box-body -->
      <div class="box-footer">
        {!! $tarefas->links() !!}
      </div>
      <!-- box-footer -->
    </div>
    <!-- /.box -->
  </div>


</div>
</div>

<div class="row" style="padding: 15px;">
  <div class="col-md-6">
    {!! $grafico_emprestimos_mes->html() !!}
  </div>

  <div class="col-md-6">
    {!! $grafico_pessoas_mes->html() !!}
  </div>
</div>

{!! Charts::scripts() !!}
{!! $grafico_emprestimos_mes->script() !!}
{!! $grafico_pessoas_mes->script() !!}
      
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  $(document).ready(function($){
    $('.input_telefone').mask('(00) 00000-0000');
  });
</script>
    

@stop