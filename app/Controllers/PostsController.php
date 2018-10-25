<?php
/** Criando calss controller da rota PostsController 
*
*   ------------ Esclarecendo duvidas ------------
*
*
**/

namespace App\Controllers;
use Core\BaseController;

class PostsController extends BaseController
{
    public function index()
    {
        echo "Posts";
    }

    public function show($id, $request)
    {
        echo $id . "<br/>";
        echo $request->get->nome . "<br/>";
        echo $request->get->sexo . "<br/>";
    }
}