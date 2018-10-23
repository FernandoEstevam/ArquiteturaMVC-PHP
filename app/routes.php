<?php 

/** Criando Definição de routas da aplicação **/

/** 
 * 1° rota => - quando não digitar nada depois da '/' => 'chama' HomeController@index
 * 
 * 
 * **/

$routes[] = ['/', 'HomeController@index'];

return $routes;