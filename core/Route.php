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

    public function __construct(array $routes)
    {   
        $this->routes = $routes;
        $this->run();
    }

    //Coletando a URL
    private function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    //Comparando URL
    private function run()
    {   
        echo $this->getUrl();
    }

}