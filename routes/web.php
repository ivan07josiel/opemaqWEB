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

// Só entra nessas rotas se passa pelo middleware de autenticacao
$this->group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){
    
    // Rotas para paginas de configuracao
    $this->group(['prefix' => 'configuracoes'], function(){
        
        // Rotas para paginas de funcionarios 
        $this->group(['prefix' => 'funcionarios'], function(){
            $this->get('/', 'FuncionarioController@index')->name('funcionarios.index');
            $this->post('cadastrar', 'FuncionarioController@store')->name('funcionarios.store');
            $this->get('cadastrar', 'FuncionarioController@cadastrarView')->name('funcionarios.cadastrar');
            $this->get('{id}/editar', 'FuncionarioController@editarView')->name('funcionarios.editarView');
            $this->post('editar', 'FuncionarioController@update')->name('funcionarios.update');
            $this->get('{id}/deletar', 'FuncionarioController@excluirView')->name('funcionarios.excluirView');
            $this->get('{id}/delete', 'FuncionarioController@delete')->name('funcionarios.delete');


        });
        
        // Rotas para paginas de propriedades 
        $this->group(['prefix' => 'propriedades'], function(){
            $this->get('/', 'PropriedadeController@index')->name('propriedades.index');
            $this->post('cadastrar', 'PropriedadeController@store')->name('propriedades.store');
            $this->get('cadastrar', 'PropriedadeController@cadastrarView')->name('propriedades.cadastrar');
            $this->get('{id}/editar', 'PropriedadeController@editarView')->name('propriedades.editarView');
            $this->post('editar', 'PropriedadeController@update')->name('propriedades.update');
            $this->get('{id}/deletar', 'PropriedadeController@excluirView')->name('propriedades.excluirView');
            $this->get('{id}/delete', 'PropriedadeController@delete')->name('propriedades.delete');


        });
        
        // Rotas para paginas de funções 
        $this->group(['prefix' => 'funcoes'], function(){
            $this->get('/', 'FuncaoController@index')->name('funcoes.index');
            $this->post('cadastrar', 'FuncaoController@store')->name('funcoes.store');
            $this->get('cadastrar', 'FuncaoController@cadastrarView')->name('funcoes.cadastrar');
            $this->get('{id}/editar', 'FuncaoController@editarView')->name('funcoes.editarView');
            $this->post('editar', 'FuncaoController@update')->name('funcoes.update');
            $this->get('{id}/deletar', 'FuncaoController@excluirView')->name('funcoes.excluirView');
            $this->get('{id}/delete', 'FuncaoController@delete')->name('funcoes.delete');


        });
        
        // Rotas para paginas de tratores/implementos 
        $this->group(['prefix' => 'tratores-implementos'], function(){
            $this->get('/', 'TratorController@index')->name('tratores.index');
            $this->post('cadastrar', 'TratorController@store')->name('tratores.store');
            $this->get('cadastrar', 'TratorController@cadastrarView')->name('tratores.cadastrar');
            $this->get('{id}/editar', 'TratorController@editarView')->name('tratores.editarView');
            $this->post('editar', 'TratorController@update')->name('tratores.update');
            $this->get('{id}/deletar', 'TratorController@excluirView')->name('tratores.excluirView');
            $this->get('{id}/delete', 'TratorController@delete')->name('tratores.delete');


        });
        
        // Rotas para paginas de conjuntos mecanizados 
        $this->group(['prefix' => 'conj-mecanizados'], function(){
            $this->get('/', 'CMecanizadoController@index')->name('conjuntos.index');
            $this->post('cadastrar', 'CMecanizadoController@store')->name('conjuntos.store');
            $this->get('cadastrar', 'CMecanizadoController@cadastrarView')->name('conjuntos.cadastrar');
            $this->get('{id}/editar', 'CMecanizadoController@editarView')->name('conjuntos.editarView');
            $this->post('editar', 'CMecanizadoController@update')->name('conjuntos.update');
            $this->get('{id}/deletar', 'CMecanizadoController@excluirView')->name('conjuntos.excluirView');
            $this->get('{id}/delete', 'CMecanizadoController@delete')->name('conjuntos.delete');


        });
    });
    
    // Rotas para paginas de desempenho
    $this->group(['prefix' => 'desempenho'], function(){
        
        // Rotas para paginas de analise operacional
        $this->group(['prefix' => 'analise'], function(){
            $this->get('/', 'OperacaoController@index')->name('analise.index');
            $this->post('cadastrar', 'OperacaoController@store')->name('analise.store');
            $this->get('cadastrar', 'OperacaoController@cadastrarView')->name('analise.cadastrar');
            $this->get('{id}/editar', 'OperacaoController@editarView')->name('analise.editarView');
            $this->post('editar', 'OperacaoController@update')->name('analise.update');
            $this->get('{id}/deletar', 'OperacaoController@excluirView')->name('analise.excluirView');
            $this->get('{id}/delete', 'OperacaoController@delete')->name('analise.delete');


        });
        
        // Rotas para paginas de planejamento 
        $this->group(['prefix' => 'planejamento'], function(){
            $this->get('/', 'PlanejamentoController@index')->name('planejamento.index');
            $this->post('cadastrar', 'PlanejamentoController@store')->name('planejamento.store');
            $this->get('cadastrar', 'PlanejamentoController@cadastrarView')->name('planejamento.cadastrar');
            $this->get('{id}/editar', 'PlanejamentoController@editarView')->name('planejamento.editarView');
            $this->post('editar', 'PlanejamentoController@update')->name('planejamento.update');
            $this->get('{id}/deletar', 'PlanejamentoController@excluirView')->name('planejamento.excluirView');
            $this->get('{id}/delete', 'PlanejamentoController@delete')->name('planejamento.delete');
            $this->get('{idOperacao}/getlargura', 'PlanejamentoController@getLargura')->name('planejamento.getLargura');


        });
        
        // Rotas para paginas de funções 
        $this->group(['prefix' => 'funcoes'], function(){
            $this->get('/', 'FuncaoController@index')->name('funcoes.index');
            $this->post('cadastrar', 'FuncaoController@store')->name('funcoes.store');
            $this->get('cadastrar', 'FuncaoController@cadastrarView')->name('funcoes.cadastrar');
            $this->get('{id}/editar', 'FuncaoController@editarView')->name('funcoes.editarView');
            $this->post('editar', 'FuncaoController@update')->name('funcoes.update');
            $this->get('{id}/deletar', 'FuncaoController@excluirView')->name('funcoes.excluirView');
            $this->get('{id}/delete', 'FuncaoController@delete')->name('funcoes.delete');


        });
        
        // Rotas para paginas de tratores/implementos 
        $this->group(['prefix' => 'tratores-implementos'], function(){
            $this->get('/', 'TratorController@index')->name('tratores.index');
            $this->post('cadastrar', 'TratorController@store')->name('tratores.store');
            $this->get('cadastrar', 'TratorController@cadastrarView')->name('tratores.cadastrar');
            $this->get('{id}/editar', 'TratorController@editarView')->name('tratores.editarView');
            $this->post('editar', 'TratorController@update')->name('tratores.update');
            $this->get('{id}/deletar', 'TratorController@excluirView')->name('tratores.excluirView');
            $this->get('{id}/delete', 'TratorController@delete')->name('tratores.delete');


        });
    });

    $this->get('admin', 'AdminController@index')->name('admin.home');
    $this->get('/', 'AdminController@index')->name('home');
});
    
// Rota para home quando não está logado
//$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

