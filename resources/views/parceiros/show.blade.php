@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Parceiro</h1>
@stop

@section('content')
    
 <div class="box box-primary" style="padding: 10px;">
	<h1>Dados do Parceiro</h1>
    
    <div class="row">
    	<div class="col-md-4">
    		<h4>Nome: {{ $parceiro->nome }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Tipo: {{ $parceiro->fisica_juridica }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Telefone: {{ $parceiro->telefone }}</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<h4>Email: {{ $parceiro->email }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Estado: {{ $parceiro->estado }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Cidade: {{ $parceiro->cidade }}</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<h4>Endereço: {{ $parceiro->endereco }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Bairro: {{ $parceiro->bairro }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Número: {{ $parceiro->numero }}</h4>    	
    	</div>
    </div>
</div>
@stop

