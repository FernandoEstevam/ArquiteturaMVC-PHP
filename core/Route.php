<?php
/** Criando classe de rotas
 *  ------------ Esclarecendo duvidas -------------- 
 *  parse_url() captura o endereço na url e transforma em uma array
 *  PHP_URL_PATH seta o indice do array path/ "http://php.net/manual/pt_BR/function.parse-url.php"
 * 
 * Método run() faz a comparação da url verifica se existe algum parametro e faz a troca dentro da {}
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
        $url = $this->getUrl();
        $urlArray = explode('/', $url);
        
        foreach($this->routes as $route){
            $routeArray = explode('/', $route[0]);
            
            for($i = 0; $i < count($routeArray); $i++){
                if((strpos($routeArray[$i], "{") !==false) && (count($urlArray) == count($routeArray))){
                   $routeArray[$i] = $urlArray[$i]; 
                }
                $route[0] = implode($routeArray, '/');
            }
            if($url == $route[0]){
                echo $route[0] . "<br>";
                echo $route[1] . "<br>";
                break;
            }
        }
    }   
    }