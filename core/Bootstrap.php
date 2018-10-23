<?php
/** Criando class Bootstrap
 * 
 * Ele chama tada a inicialização do nosso sistema
 * 
 * 
 * 
 * **/
//Importando o arquivo de rotas routes
$routes = require_once __DIR__."/../app/routes.php";

//Instanciando a classe Route
$route = new \Core\Route($routes);