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

    //Metodo pagina de erro verifica se o arquivo existe, caso sim chama o arquivo
    public static function pageNotFound(){
        if(file_exists('../App/Views/Erro/404.phtml')){
            return  require_once "../App/Views/Erro/404.phtml";
        } else {
            echo "Error 404: Page not found!";
        }
    }
    public static function getModel($model)
    {
     $objModel = "\\App\\Models\\" . $model;
     return new $objModel(DataBase::getDatabase());
    }
}