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
        $this->id = (int)$_GET['id'];
        $query = "DELETE FROM tarefas WHERE id = $this->id";
        $this->conn->query($query);

        header('Location: ../index.php');
    }

    public function update()
    {
        $this->id = (int)$_GET['id'];
        $this->titulo = $_POST['setTitulo'];
        $this->descricao = $_POST['setDescricao'];
        $query = "UPDATE tarefas SET titulo = '$this->titulo', descricao = '$this->descricao' WHERE id = $this->id";
        $this->conn->query($query);
        header('Location: ../index.php');
    }
}

function CreateTask()
{

    if (isset($_POST['titulo']) && isset($_POST['descricao'])) {

        $tarefa = new Tarefa(new Conexao(), $_POST['titulo'], $_POST['descricao']);

        $tarefa->create();
    }
}

CreateTask();

function toggleStatus()
{
    if (isset($_GET['id']) && isset($_GET['estado']) == 'true') {
        $tarefa = new Tarefa(new Conexao(), '', '');
        $tarefa->toggleStatus();

        /* header('Location: ../index.php'); */
    }
}

toggleStatus();

function deleteTask()
{
    if (isset($_GET['id']) && isset($_GET['delete']) == 'true') {
        $tarefa = new Tarefa(new Conexao(), '', '');
        $tarefa->delete();
    }
}

deleteTask();

function updateTask()
{
    if (isset($_GET['id']) && isset($_GET['update']) == 'true') {
        $tarefa = new Tarefa(new Conexao(), '', '');
        $tarefa->update();
    }
}

updateTask();
