<?php
/** Criando classe de rotas
 *  ------------ Esclarecendo duvidas -------------- 
 *  parse_url() captura o endereço na url e transforma em uma array
 *  PHP_URL_PATH seta o indice do array path/ "http://php.net/manual/pt_BR/function.parse-url.php"
 *  na variavel do obj colocar @ antes do $ \stdClass - Classe base de um objeto sem valor sem nome
 * Método run() faz a comparação da url verifica se existe algum parametro e faz a troca dentro da {}
 * **/

namespace Core;

//Declarando a class de rotas
class Route 
{   
    private $routes;

    public function __construct(array $routes)
    {   
        $this->setRoutes($routes);
        $this->run();
    }

    //Seta a rota, recebe as rotas
    private function setRoutes($routes)
    {
        foreach ($routes as $route) {
            $explode = explode('@', $route[1]);
            $r = [$route[0], $explode[0], $explode[1]];
            $newRoutes[] = $r;
        }
        $this->routes = $newRoutes;
    }

    //metodo Request POST/GET
    private function getRequest()
    {
        $obj = new \stdClass;
        //Percorre o metodo get a chave e o valor
        foreach ($_GET as $key => $value) {
            @$obj->get->$key = $value;
        }
        //Percorre o metodo post a chave e o valor
        foreach ($_POST as $key => $value) {
            @$obj->post->$key = $value;
        }

        return $obj;
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
            $param = [];
            for($i = 0; $i < count($routeArray); $i++){
                if((strpos($routeArray[$i], "{") !==false) && (count($urlArray) == count($routeArray))){
                   $routeArray[$i] = $urlArray[$i];
                   $param[] = $urlArray[$i]; 
                }
                $route[0] = implode($routeArray, '/');
            }
            //Se a rota for encotrada faça
            if($url == $route[0]){
                //foi encotrada a rota
                $found = true;
                $controller = $route[1];
                $action = $route[2];
                //break foreach
                break;
            }
        }
      
        if($found) {
            $controller = Container::newController($controller);
            switch (count($param)) {
                case 1:
                    $controller->$action($param[0], $this->getRequest());
                    break;
                case 2:
                    $controller->$action($param[0], $param[1], $this->getRequest());
                    break;
                case 3:
                    $controller->$action($param[0], $param[1], $param[2], $this->getRequest());
                    break;               
                default:
                    $controller->$action();
            }
        } else {
            echo "Página não encotrada!! Error 404";
        }
    }   
}