<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório - Lista de Produtos Indisponíveis</title>
    </head>
    <body>
         
 
 
<h1>Lista de Produtos Indisponíveis</h1>
 
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
      @forelse ($produtos_indisponiveis as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>{{ $p->nome }}</td>
          <td>{{ date( 'd/m/Y' , strtotime($p->data_recebimento))}}</td>
          <td>{{ $p->marca }}</td>
          <td>{{ $p->modelo }}</td>
          <td>{{ $p->estado }}</td>
          <td>{{ $p->procedencia }}</td>
          <td>{{ date( 'd/m/Y' , strtotime($p->created_at))}}</td>
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