<?php

class Conexao
{
    private $host = 'localhost';
    private $dbname = 'tarefaslist';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function conectar()
    {
        try {
            $conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            return $conn;

            echo 'Conectado com sucesso!';
        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}
