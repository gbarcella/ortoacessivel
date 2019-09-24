@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Produto</h1>
@stop

@section('content')
    
 <div class="box box-primary" style="padding: 10px;">
	<h1>Dados do Produto</h1>
    
    <div class="row">
    	<div class="col-md-4">
    		<h4>Código de Identificação: {{ $produto->codigo_identificacao }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Nome: {{ $produto->nome }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Parceiro: @php echo $parceiro @endphp</h4>
    	</div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <h4>Status: {{ $produto->status }}</h4>
        </div>

    	<div class="col-md-3">
    		<h4>Estado: {{ $produto->estado }}</h4>
    	</div>

    	<div class="col-md-3">
    		<h4>Procedência: {{ $produto->procedencia }}</h4>
    	</div>

    	<div class="col-md-3">
    		<h4>Data Recebimento: {{ date( 'd/m/Y' , strtotime($produto->data_recebimento))}}</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<h4>Descrição: {{ $produto->descricao }} </h4>
    	</div>
    </div>
</div>
@stop

