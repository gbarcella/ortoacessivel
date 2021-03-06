<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ROTAS PÚBLICAS
Route::get('/', 'SiteController@index')->name('/');

//Rota para cadastrar interesse pelo website
Route::post('/store-interesse-website', 'SiteController@storeInteresse')->name('store-interesse-website');

//Rota para cadastrar uma solicitacao de acesso ao sistema
Route::post('/store-solicitacao', 'SiteController@storeSolicitacao')->name('store-solicitacao');

Auth::routes();

//Rota dashboard
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function() {

	//Campo de busca de pessoas pelo nome
	Route::get('/search-pessoa', 'PessoaController@search');

	//Campo de busca de usuarios pelo nome
	Route::get('/search-user', 'UserController@search');

	//Campo de busca de parceiros pelo nome
	Route::get('/search-parceiro', 'ParceiroController@search');

	//Campo de busca de produtos pelo codigo de identificacao
	Route::get('/search-produto', 'ProdutoController@search');

	//Campo de busca de emprestimos pela data de inicio
	Route::get('/search-emprestimos', 'EmprestimoController@search');

	//Rota para cadastrar interesse
	Route::post('/store-interesse', 'HomeController@storeInteresse');

	//Rota para deletar interesse
	Route::delete('/destroy-interesse/{interesse}', 'HomeController@destroyInteresse')->name('destroy-interesse');

	//Rota para editar interesse
	Route::put('/update-interesse/{interesse}', 'HomeController@updateInteresse')->name('update-interesse');

	//Rota para cadastrar tarefa
	Route::post('/store-tarefa', 'HomeController@storeTarefa');

	//Rota para deletar tarefa
	Route::delete('/destroy-tarefa/{tarefa}', 'HomeController@destroyTarefa')->name('destroy-tarefa');

	//Rota para editar tarefa
	Route::put('/update-tarefa/{tarefa}', 'HomeController@updateTarefa')->name('update-tarefa');

	//ROTAS DE RELATORIOS

	//Lista de interesses
	Route::get('/relatorio-interesses', 'RelatorioController@interesses')->name('relatorio-interesses');

	//Lista de tarefas do mês
	Route::get('/relatorio-tarefas-mes', 'RelatorioController@tarefasMes')->name('relatorio-tarefas-mes');

	//Empréstimos pendentes
	Route::get('/relatorio-emprestimos-pendentes', 'RelatorioController@emprestimosPendentes')->name('relatorio-emprestimos-pendentes');

	//Empréstimos em andamento
	Route::get('/relatorio-emprestimos-andamento', 'RelatorioController@emprestimosAndamento')->name('relatorios-emprestimos-andamento');
	
	//Novas Pessoas do Mês
	Route::get('/relatorio-novas-pessoas-mes', 'RelatorioController@pessoasNovasMes')->name('relatorio-novas-pessoas-mes');

	//Novos Produtos do Mês
	Route::get('/relatorio-novos-produtos-mes', 'RelatorioController@produtosNovosMes')->name('relatorio-produtos-novos-mes');

	//Produtos Indisponíveis
	Route::get('/relatorio-produtos-indisponiveis', 'RelatorioController@produtosIndisponiveis')->name('relatorio-produtos-indisponiveis');

	//Produtos Disponíveis
	Route::get('/relatorio-produtos-disponiveis', 'RelatorioController@produtosDisponiveis')->name('relatorio-produtos-disponiveis');

	//FIM DE ROTAS DE RELATORIOS

	//Rota para acessar solicitacoes de acesso ao sistema
	Route::get('/solicitacoes', 'SolicitacaoController@index')->name('solicitacoes');

	//Rota para deletar uma solicitacao de acesso ao sistema
	Route::delete('/solicitacoes-destroy/{solicitacao}', 'SolicitacaoController@destroy')->name('solicitacoes-destroy');

	//Rota para cadastrar um chamado de suporte via dashboard
	Route::post('/store-chamado', 'HomeController@storeChamado')->name('store-chamado');

	//Rota para listagem de chamados usuario standard
	Route::get('/chamados', 'ChamadoController@index')->name('chamados');

	//Rota para deletar um chamado
	Route::delete('/destroy-chamado/{chamado}', 'ChamadoController@destroy')->name('destroy-chamado');

	//Rota para chamados abertos (somente admin)
	Route::get('/chamados-abertos', 'ChamadoController@chamadosAbertos')->name('chamados-abertos');

	//Rota para chamados concluidos (somente admin)
	Route::get('/chamados-concluidos', 'ChamadoController@chamadosConcluidos')->name('chamados-concluidos');

	//Rota para usuario standard pesquisa chamado pelo titulo
	Route::get('/search-chamado-usuario-standard', 'ChamadoController@searchChamadoUsuarioStandard')->name('search-chamado-usuario-standard');

	//Rota para usuario admin pesquisar chamado aberto pelo titulo
	Route::get('/search-chamado-usuario-admin-aberto', 'ChamadoController@searchChamadoUsuarioAdminAberto')->name('search-chamado-usuario-admin-aberto');

	//Rota para usuario admin pesquisar chamado fechado pelo titulo
	Route::get('/search-chamado-usuario-admin-fechado', 'ChamadoController@searchChamadoUsuarioAdminFechado')->name('search-chamado-usuario-admin-fechado');

	//Rota para usuario editar um chamado
	Route::get('/edit-chamado/{chamado}', 'ChamadoController@editChamado')->name('edit-chamado');

	//Rota para usuario atualizar um chamado
	Route::put('/update-chamado/{chamado}', 'ChamadoController@updateChamado')->name('update-chamado');

	//Rota para editar chamado status aberto
	Route::get('/edit-chamado-aberto/{chamado}', 'ChamadoController@editChamadoAberto')->name('edit-chamado-aberto');

	//Rota para usuario atualizar um chamado aberto
	Route::put('/update-chamado-aberto/{chamado}', 'ChamadoController@updateChamadoAberto')->name('update-chamado-aberto');

	//Rota para editar chamado status concluido
	Route::get('/edit-chamado-fechado/{chamado}', 'ChamadoController@editChamadoFechado')->name('edit-chamado-fechado');

	//Rotar para atualizar um chamado fechado
	Route::put('/update-chamado-fechado/{chamado}', 'ChamadoController@updateChamadoConcluido')->name('update-chamado-fecahdo');
});


//Grupo de rotas resources
Route::middleware(['auth'])->group(function () {
	
	Route::resources([
    	'users' 		=> 'UserController',
    	'parceiros'		=> 'ParceiroController',
    	'pessoas'		=> 'PessoaController',
    	'produtos'		=> 'ProdutoController',
		'emprestimos'	=> 'EmprestimoController',
		'relatorios'	=> 'RelatorioController',
	]);
});

