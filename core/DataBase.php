<?php

//Classe conexão com banco de dados
namespace Core;
use PDO;
use PDOException;

class DataBase
{
    public function getDataBase()
    {   
        //Retorna o arquivo database.php
        $conf = include_once __DIR__."/../App/database.php";
        //Se o driver for
        if($conf['driver'] == 'sqlite'){
            //A variável tera o caminho do drive
            $sqlite = __DIR__."/../storage/database/".$conf['sqlite']['host'];
            $sqlite = "sqlite:".$sqlite; 
            try{
                //Setando a classe PDO
                $pdo = new PDO($sqlite);
                //Setando erro da classe PDO tipo de erros mensagem de erros
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Setando que toda consulta retorne um objeto   
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            }catch(PDOException $e){
                echo "Error: ".$e->getMessage();
            }
        }else if($conf['diver']== 'mysql'){
            $host = $conf['mysql']['host'];
            $db = $conf['mysql']['database'];
            $user = $conf['mysql']['user'];
            $pass = $conf['mysql']['password'];
            $charset = $conf['mysql']['charset'];
            $collation = $conf['mysql']['collation'];

            try{
                $pdo = new PDO("msql:host=$host;dbname=$db;charset=$charset", $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '$charset' COLLATE '$collation'");
                $pdp->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
                return $pdo;
            }catch(PDOException $e){
                echo "Error: ".$e->getMessage();
            }
        }
    }

}
 