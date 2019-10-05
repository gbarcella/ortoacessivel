@extends('adminlte::page')

@section('', '')

@section('content_header')
<h1>Chamados Concluídos</h1>
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

        <div class="col-md-12">
            <form action="/search-chamado-usuario-admin-fechado" method="get">
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


    <br />

    <div class="table-responsive">

        <table class="table ">
            <thead style="background-color: #605CA8; color: #fff;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Solicitante</th>
                    <th width="60px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($chamados_concluidos as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->titulo }}</td>
                    <td>{{ $c->prioridade }}</td>
                    <td>{{ $c->descricao }}</td>
                    <td>{{ $c->status }}</td>
                    <td>{{ $c->usuario->name }}</td>
                    <td>
                        <form action="{{ route('destroy-chamado', $c->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                onclick="return confirm('Tem certeza que deseja deletar o registro?')"><i
                                    class="fa fa-trash"></i></a></button>
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

{!! $chamados_concluidos->links() !!}
@stop