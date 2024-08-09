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
          <button id="btn-remove"><i class="fa-solid fa-xmark"></i></button>
          <button id="btn-update"><i class="fa-solid fa-pen"></i></button>
        </div>
      </div>
      <?php } ?>
    </div>
  </main>
  <script src="js/index.js"></script>
</body>

</html>