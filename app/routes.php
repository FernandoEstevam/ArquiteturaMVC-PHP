<?php 

/** Criando Definição de routas da aplicação **/

/** 
 * Padrão laravel
 * 1° rota => - quando não digitar nada depois da '/' => 'chama' HomeController@index
 * 2º rota => - quando o usuario passa um parametro '/posts' => 'chama' PostsController@show
 * 
 * **/

$routes[] = ['/', 'HomeController@index'];
$routes[] = ['/posts', 'PostsController@index'];
$routes[] = ['/post/{id}/show', 'PostsController@show'];

return $routes;