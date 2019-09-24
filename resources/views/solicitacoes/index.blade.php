@extends('adminlte::page')

@section('', '')

@section('content_header')
<h1>Solicitações</h1>
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

<div class="container">
    @forelse ($solicitacoes as $s)
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('solicitacoes-destroy', $s->id) }}" method="post">
                @csrf
                @method('delete')

                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                padding: 3%;
                background-color: #fff;">

                    <h3><b>{{$s->nome}}</b></h3>
                    <p>{{$s->email}}</p>
                    <p>{{$s->telefone}}</p>
                    <p>{{$s->mensagem}}</p>

                    <button type="submit" class="btn btn-danger" style="width: 100%;">Excluir</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    @empty
    <h3>Não há registros</h3>
    @endforelse
</div>

@stop