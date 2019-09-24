<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório - Lista de Pessoas Novas do Mês</title>
    </head>
    <body>
         
 
 
<h1>Lista de Pessoas Novas do Mês</h1>
 
<table class="table">
    <thead style="background-color: #333; color: #fff;">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Sobrenome</th>
        <th scope="col">Telefone</th>
        <th scope="col">CPF</th>
        <th scope="col">Cidade</th>
        <th scope="col">Data de Cadastro</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($novas_pessoas_mes as $n)
        <tr>
          <td>{{ $n->id }}</td>
          <td>{{ $n->nome }}</td>
          <td>{{ $n->sobrenome }}</td>
          <td>{{ $n->telefone }}</td>
          <td>{{ $n->cpf }}</td>
          <td>{{ $n->cidade }}</td>
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