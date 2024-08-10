function mudarEstado(id) {
  const url =
    "http://localhost/to-do-list/php/tarefa.php" + "?id=" + id + "&estado=true";

  console.log((window.location.href = url));
}

function deleteTask(id) {
  const url =
    "http://localhost/to-do-list/php/tarefa.php" + "?id=" + id + "&delete=true";

  console.log((window.location.href = url));
}

function upModal() {
  let modal = document.querySelector(".modal");

  modal.showModal();

  let btnClose = document.querySelector("#btn-cancel");
  btnClose.addEventListener("click", function () {
    modal.close();
  });
}
