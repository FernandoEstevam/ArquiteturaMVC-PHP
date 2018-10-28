<?php 

//Classe abstrada para que não seja instanciada somente herdada

namespace Core;
use PDO;

abstract class BaseModel
{
    private $pdo;
    protected $table;

    public function __construct(PDO $pdo)
    {   
        //Objeto de conexão
        $this->pdo = $pdo;
    }

    //Retorna todos os registros do banco de dados da tabela informada
    public function All()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchALL();
        $stmt->closeCursor();
        return $result;
    }
}