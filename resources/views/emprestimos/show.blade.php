@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Parceiro</h1>
@stop

@section('content')
    
 <div class="box box-primary" style="padding: 10px;">
	<h1>Dados do Empréstimo</h1>
    
    <div class="row">
    	<div class="col-md-4">
    		<h4>Data Início: {{ date( 'd/m/Y' , strtotime($emprestimo->data_inicio))}}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Data Devolução: {{ date( 'd/m/Y' , strtotime($emprestimo->data_devolucao))}}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Status: {{ $emprestimo->status }}</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-6">
    		<h4>Pessoa: @php echo($pessoa->nome) @endphp</h4>
    	</div>

    	<div class="col-md-6">
    		<h4>Produto: @php echo($produto->nome) @endphp</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<h4>Observações: {{$emprestimo->observacoes}}</h4>
    	</div>
    </div>
</div>
@stop

