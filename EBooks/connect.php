<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "biblioteca";
    private $pdo;

    // Construtor que cria a conexão com o banco
    public function __construct() {
        try {
            // Estabelecendo a conexão PDO
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            // Definindo o modo de erro do PDO para exceções
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Caso haja erro na conexão, exibe a mensagem
            die("Falha ao se conectar no BD: " . $e->getMessage());
        }
    }

    // Método para obter a conexão PDO
    public function getConnection() {
        return $this->pdo;
    }

    // Método para fechar a conexão
    public function closeConnection() {
        $this->pdo = null;
    }
}

$database = new Database(); // Cria a instância da classe Database
$pdo = $database->getConnection(); // Obtém a conexão com o banco de dados

// Ao finalizar, fecha a conexão chamando o seguinte método
$database->closeConnection();
?>
