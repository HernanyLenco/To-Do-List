function mudarEstado(id) {
  const url = "http://localhost/to-do-list/php/tarefa.php" + "?id=" + id;

  console.log((window.location.href = url));

}
