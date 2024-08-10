<?php 

  include_once 'php/tarefa.php';
  $tarefa = new Tarefa(new Conexao(), '', '');
  $tarefas = $tarefa->read();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ToDoList</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/medias.css" />
</head>

<body>
  <h1>Lista De Tarefas</h1>
  <p>Desenvolvido Por @Hernani Lenço</p>
  <main>
    <div class="header">
      <form class="inputs" id="form" method="post" action="./php/tarefa.php">
        <input type="text" id="titulo" name="titulo" placeholder="Titulo" required/>
        <input type="text" id="descricao" name="descricao" placeholder="Descrição..." required />
      </form>
      <button type="submit" form="form" id="btn-add">
        <i class="fa-solid fa-plus"></i>
      </button>
    </div>
    <div class="body">
      <?php foreach ($tarefas as $tarefa) { ?>
      <div class="task">
        <div class="task-text">
          <span class="<?=$tarefa['estado']?>"> <?=$tarefa['estado']?> </span>
          <span class="task-title"><?=$tarefa['titulo']?></span>
          <span class="task-description"><?=$tarefa['descricao']?></span>
          <span class="data-criacao">Tarefa criada há:  <?=$tarefa['data_criacao']?></span>
        </div>
        <div class="task-btns">
          <button id="btn-status" onclick="mudarEstado(<?=$tarefa['id']?>)"><i class="fa-solid fa-check"></i></button>
          <button id="btn-remove" onclick="deleteTask(<?=$tarefa['id']?>)" ><i class="fa-solid fa-xmark"></i></button>
          <button id="btn-update" onclick="upModal()"><i class="fa-solid fa-pen"></i></button>
        </div>
      </div>
      <?php } ?>
    </div>
    <dialog class="modal">
      <h2>Editar Tarefa</h2>
    <form class="inputs-modal" id="form-modal" method="post" action="./php/tarefa.php?id=<?=$tarefa['id']?>&update=true">
        <input type="text" id="modal-title" name="setTitulo" placeholder="Novo Titulo" required/>
        <input type="text" id="modal-description" name="setDescricao" placeholder="Nova Descrição..." required/>
      </form>
      <div class="modal-btns">
        <button type="submit" id="updateTask" form="form-modal">Salvar</button>
        <button id="btn-cancel">Cancelar</button>
      </div>
    </dialog>
  </main>
  <script src="js/index.js"></script>
</body>

</html>