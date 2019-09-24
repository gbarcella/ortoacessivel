<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório - Empréstimos em Andamento</title>
    </head>
    <body>
         
 
 
<h1>Lista de Empréstimos em Andamento</h1>
 
<table class="table">
    <thead style="background-color: #333; color: #fff;">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Data de Início</th>
        <th scope="col">Data de Devolução</th>
        <th scope="col">Pessoa</th>
        <th scope="col">Produto</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($emprestimos_andamento as $e)
        <tr>
          <td>{{ $e->id }}</td>
          <td>{{ date( 'd/m/Y' , strtotime($e->data_inicio))}}</td>
          <td>{{ date( 'd/m/Y' , strtotime($e->data_devolucao))}}</td>
          <td>{{ $e->pessoa->nome }} {{ $e->pessoa->sobrenome }}</td>
          <td>{{ $e->produto->nome }}</td>
          <th>{{ $e->status }}</th>
        </tr>

        @empty
          <tr>
          <td>Não há registros</td>
         </tr>

      @endforelse
    </tbody>
  
  </table>
 
 
 
    </body>
</html>