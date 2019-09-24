<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório - Lista de Interesses</title>
    </head>
    <body>
         
 
 
<h1>Lista de Interesses</h1>
 
<table class="table">
    <thead style="background-color: #333; color: #fff;">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Interesse</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($interesses as $i)
        <tr>
          <td>{{ $i->id }}</td>
          <td>{{ $i->nome }}</td>
          <td>{{ $i->telefone }}</td>
          <td>{{ $i->interesse }}</td>
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