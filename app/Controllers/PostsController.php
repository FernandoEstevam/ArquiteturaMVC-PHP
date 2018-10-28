<?php
/** Criando calss controller da rota PostsController 
*
*   ------------ Esclarecendo duvidas ------------
*
*
**/
namespace App\Controllers;

use Core\BaseController;
use Core\Container;


class PostsController extends BaseController
{
    public function index(){
        $model = Container::getModel("Post");
        $posts = $model->All();
        echo json_encode($posts);
    }

    public function show($id, $request)
    {
        echo $id . "<br/>";
        echo $request->get->nome . "<br/>";
        echo $request->get->sexo . "<br/>";
    }
}