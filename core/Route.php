<?php
/** Criando classe de rotas
 *  ------------ Esclarecendo duvidas -------------- 
 *  parse_url() captura o endereço na url e transforma em uma array
 *  PHP_URL_PATH seta o indice do array path/ "http://php.net/manual/pt_BR/function.parse-url.php"
 * 
 * **/

namespace Core;

//Declarando a class de rotas
class Route 
{   
    private $routes;

    //Quando instanciar a class
    public function __contruct(array $routes)
    {
         $this->routes = $routes;
    }

    //Coletando a URL
    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    //Comparando URL
    public
}