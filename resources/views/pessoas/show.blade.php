@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Pessoa</h1>
@stop

@section('content')
    
 <div class="box box-primary" style="padding: 10px;">
	<h1>Dados da Pessoa</h1>
    
    <div class="row">
    	<div class="col-md-3">
    		<h4>Nome: {{ $pessoa->nome }}</h4>
    	</div>

    	<div class="col-md-3">
    		<h4>Sobrenome: {{ $pessoa->sobrenome }}</h4>
    	</div>

        <div class="col-md-3">
            <h4>Data Nascimento: {{ date( 'd/m/Y' , strtotime($pessoa->nascimento))}}</h4>
        </div>

    	<div class="col-md-3">
    		<h4>CPF: {{ $pessoa->cpf }}</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-5">
    		<h4>Email: {{ $pessoa->email }}</h4>
    	</div>

    	<div class="col-md-3">
    		<h4>Telefone: {{ $pessoa->telefone }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Telefone 2: {{ $pessoa->telefone2 }}</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-3">
    		<h4>Sexo: {{ $pessoa->sexo }}</h4>
    	</div>
    	<div class="col-md-5">
    		<h4>Estado: {{ $pessoa->estado }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Cidade: {{ $pessoa->cidade }}</h4>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<h4>Endereço: {{ $pessoa->endereco }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Bairro: {{ $pessoa->bairro }}</h4>
    	</div>

    	<div class="col-md-4">
    		<h4>Número: {{ $pessoa->numero }}</h4>    	
    	</div>
    </div>
</div>
@stop

