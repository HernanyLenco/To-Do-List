<?php

require_once 'conexao.php';

class Tarefa
{
    private $id;
    private $titulo;
    private $descricao;
    private $conn;

    public function __construct(Conexao $conn, $titulo, $descricao)
    {
        $this->conn = $conn->conectar();
        $this->titulo = $titulo;
        $this->descricao = $descricao;
    }

    public function create()
    {

        $this->titulo = $_POST['titulo'];
        $this->descricao = $_POST['descricao'];

        $query = "INSERT INTO tarefas (titulo, descricao) values ('$this->titulo', '$this->descricao')";

        $this->conn->query($query);

        header('Location: ../index.php');
    }

    public function read()
    {

        $query = "SELECT * FROM tarefas";
        $result = $this->conn->query($query);

        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function toggleStatus()
    {
        $this->id = (int)$_GET['id'];
        $query = "UPDATE `tarefas` SET `estado` = 'concluída' WHERE `tarefas`.`id` = $this->id";

        $this->conn->query($query);

        header('Location: ../index.php');
    }

    public function delete()
    {
        $query = "DELETE FROM tarefaslist WHERE id = $this->id";
    }

    public function update()
    {
        $query = "UPDATE tarefas SET titulo = '$this->titulo', descricao = '$this->descricao' WHERE id = $this->id";
    }
}

if (isset($_POST['titulo']) && isset($_POST['descricao'])) {

    $tarefa = new Tarefa(new Conexao(), $_POST['titulo'], $_POST['descricao']);

    $tarefa->create();
}

if (isset($_GET['id'])) {
    $tarefa = new Tarefa(new Conexao(), '', '');
    $tarefa->toggleStatus();

    /* header('Location: ../index.php'); */
}
