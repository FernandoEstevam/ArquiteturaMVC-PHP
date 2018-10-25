<?php
/**
 * Class pai pode ser herdada
 * Classe base (abstrada) 
 * Não pode ser instanciada, utilizada como base para a classe que a chamar
 * 
 * 
 * */
namespace Core;

abstract class BaseController
{
    protected $view;
    private $viewPath; //Recebe o caminho onde esta a view
    private $laytouPath; //Recebe o layout como parametro (opcional  )
    public function __construct()
    {   
        $this->view = new \stdClass;
    }

    //Responsavel por redenrizar a view
    protected function renderView($viewPath, $layoutPath = null)
    {   //Coleta o caminho do arquivo
        $this->viewPath = $viewPath;
        //Recebe um parametro opcional layout
        $this->layoutPath = $layoutPath;
        if($layoutPath) {
            $this->layout();
        }else {
            //Método conteudo require_once
            $this->content();      
        }
    }
   
    //Traz o conteudo da view
    protected  function content()
    {   //Verifica se o caminho existe
        if(file_exists(__DIR__."/../App/Views/{$this->viewPath}.phtml")){
            require_once __DIR__."/../App/Views/{$this->viewPath}.phtml";
        } else {
            echo "Error: View paht not found!";
        }
    }

    //Verifica o se o layout existe
    protected  function layout()
    {   //Verifica se o caminho existe
        if(file_exists(__DIR__."/../App/Views/{$this->layoutPath}.phtml")){
            require_once __DIR__."/../App/Views/{$this->layoutPath}.phtml";
        } else {
            echo "Error: Layout paht not found!";
        }
    }

    
    
}