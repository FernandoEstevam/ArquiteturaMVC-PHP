<?php
/** Criando calss controller da rota HomeController 
*
*   ------------ Esclarecendo duvidas ------------
*
*
**/
namespace App\Controllers;
use Core\BaseController;

class HomeController extends BaseController
{   
    public function index()
    {   //Seta o titulo da página
        $this->setPageTitle('Home');
        //Chama a página home do views/home/index.phtml
        $this->renderView('home/index', 'layout');
        //Chama a página home do views/home/index.phtml
        // $this->view->nome = "Fernando Estevam";
        
    }
}