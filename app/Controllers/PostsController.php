<?php
/** Criando calss controller da rota PostsController 
*
*   ------------ Esclarecendo duvidas ------------
*
*
**/

namespace App\Controllers;

class PostsController
{
    public function index()
    {
        echo "Posts";
    }

    public function show($id)
    {
        echo $id;
    }
}