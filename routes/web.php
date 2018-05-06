<?php

Route::match(['post', 'get'], '/', 
    ['as' =>'login', 'uses' => 'LoginController@index']);

Route::match(['post', 'get'], '/login', 
    ['as' =>'login2', 'uses' => 'LoginController@index']);

Route::match(['post', 'get'], '/novo', 
    ['as' =>'novo', 'uses' => 'LoginController@novo']);

Route::match(['post', 'get'], '/sair', 
    ['as' =>'sair', 'uses' => 'LoginController@sair']);

Route::match(['post', 'get'], '/esqueci', 
    ['as' =>'esqueci', 'uses' => 'LoginController@esqueci']);


Route::group(['prefix' => 'admin/', 'middleware' => ['auth',
    'can:publica,App\Usuario']], function(){ 
    
    /* --------------------------- ALUNO ------------------------------ */
    Route::match(['post', 'get'], '/', 
        ['as' =>'home', 'uses' => 'AlunoController@index']);

    Route::match(['post', 'get'], '/cadastrar.html', 
        ['as' =>'aluno_cadastrar', 'uses' => 'AlunoController@cadastrar'])
            ->middleware('can:adm,App\Usuario');

    Route::match(['post', 'get'], '/buscar', 
        ['as' =>'aluno_buscar', 'uses' => 'AlunoController@buscar']);   

    Route::match(['post', 'get'], '/{id}/detalhes.html', 
        ['as' =>'aluno_detalhes', 'uses' => 'AlunoController@detalhes']);
    
    Route::match(['post', 'get'], '/{id}/excluir.html', 
        ['as' =>'aluno_excluir', 'uses' => 'AlunoController@excluir']);
       
    /* --------------------------- USUÁRIOS ------------------------------ */
     Route::match(['post', 'get'], '/usuario-buscar', 
        ['as' =>'usuario_buscar', 'uses' => 'LoginController@usuariobuscar']);
     
     Route::match(['post', 'get'], '/{id}/editaperfil', 
        ['as' =>'editaperfil', 'uses' => 'LoginController@editaperfil']);
     
     Route::match(['post', 'get'], '/{id}/excluir', 
        ['as' =>'usuario_excluir', 'uses' => 'LoginController@excluir']);
     
    /* ----------------------------- CURSO ------------------------------- */
    Route::group(['prefix' =>'curso/'],function(){
          Route::match(['post', 'get'], '/novo.htm', 
                ['as' =>'curso_novo', 'uses' => 'CursoController@novo']);
          
          Route::match(['post', 'get'], '/{id}/excluir.htm', 
                ['as' =>'curso_excluir', 'uses' => 'CursoController@excluir']);
    });
});
