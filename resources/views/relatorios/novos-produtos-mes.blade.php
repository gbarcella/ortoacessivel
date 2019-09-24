<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório - Lista de Produtos Novos do Mês</title>
    </head>
    <body>
         
 
 
<h1>Lista de Produtos Novos do Mês</h1>
 
<table class="table">
    <thead style="background-color: #333; color: #fff;">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Data Recebimento</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Estado</th>
        <th scope="col">Procedência</th>
        <th scope="col">Data de Cadastro</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($novos_produtos_mes as $n)
        <tr>
          <td>{{ $n->id }}</td>
          <td>{{ $n->nome }}</td>
          <td>{{ date( 'd/m/Y' , strtotime($n->data_recebimento))}}</td>
          <td>{{ $n->marca }}</td>
          <td>{{ $n->modelo }}</td>
          <td>{{ $n->estado }}</td>
          <td>{{ $n->procedencia }}</td>
          <td>{{ date( 'd/m/Y' , strtotime($n->created_at))}}</td>
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