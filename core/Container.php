<?php
/** Class responsavel por instancia todos as class controller **/

namespace Core;

class Container 
{   
    //Insciando direrto o metodo newController
    public static function newController($controller)
    {
        $objController = "App\\Controllers\\" . $controller;
        //Cria um novo objeto a partir do controller de rotas
        return new $objController;
    }
}