@extends('adminlte::page')

@section('', '')

@section('content_header')
    <h1>Relatorios</h1>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lista de Interesses</span>
                  <br>
                  <a href="/relatorio-interesses" class="btn btn-primary">Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-blue"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tarefas do Mês</span>
                  <br>
                  <a href="/relatorio-tarefas-mes" class="btn btn-primary">Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-red"><i class="fa fa-calendar-times-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Empréstimos Pendentes</span>
                  <br>
                  <a href="/relatorio-emprestimos-pendentes" class="btn btn-primary">Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fa fa-calendar-check-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Empréstimos em Andamento</span>
                  <br>
                  <a href="/relatorio-emprestimos-andamento" class="btn btn-primary" >Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Novas Pessoas/MÊS</span>
                  <br>
                  <a href="/relatorio-novas-pessoas-mes" class="btn btn-primary">Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-yellow"><i class="fa fa-cube"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Novos Produtos/MÊS</span>
                  <br>
                  <a href="/relatorio-novos-produtos-mes" class="btn btn-primary" >Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fa fa-thumbs-up"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Produtos Disponíveis</span>
                  <br>
                  <a href="/relatorio-produtos-disponiveis" class="btn btn-primary">Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>

        <div class="col-md-6">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-red"><i class="fa fa-thumbs-down"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Produtos Indisponíveis</span>
                  <br>
                  <a href="/relatorio-produtos-indisponiveis" class="btn btn-primary" >Gerar Relatório</a>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
        </div>
    </div>
</div>
@stop