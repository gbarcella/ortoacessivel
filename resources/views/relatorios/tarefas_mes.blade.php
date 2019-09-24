<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatório - Tarefas do mês</title>
    </head>
    <body>
         
 
 
<h1>Lista de Tarefas</h1>
 
<table class="table">
    <thead style="background-color: #333; color: #fff;">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tarefa</th>
        <th scope="col">Prazo</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($tarefas_mes as $t)
        <tr>
          <td>{{ $t->id }}</td>
          <td>{{ $t->tarefa }}</td>
          <td>{{ $t->prazo }}</td>
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