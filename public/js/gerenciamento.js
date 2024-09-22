// Modal Visualizar:
const visualizarProjetoModal = document.getElementById(
  "visualizarProjetoModal"
);
const verProjetoButton = document.getElementById("verProjetoButton");
const closeVisualizarProjetoModal = document.getElementById(
  "closeVisualizarProjetoModal"
);

// Função para abrir o modal de visualização
verProjetoButton.onclick = function () {
  visualizarProjetoModal.style.display = "block";
};

// Função para fechar o modal de visualização
closeVisualizarProjetoModal.onclick = function () {
  visualizarProjetoModal.style.display = "none";
};

// Fechar o modal quando o usuário clicar fora dele
window.onclick = function (event) {
  if (event.target === visualizarProjetoModal) {
    visualizarProjetoModal.style.display = "none";
  }
};

// Modal Criar:

const criarProjetoModal = document.getElementById("criarProjetoModal");
const criarProjetoButton = document.getElementById("criarProjetoButton");
const closeCriarProjetoModal = document.getElementById(
  "closeCriarProjetoModal"
);

criarProjetoButton.onclick = function () {
  console.log("teste");
  criarProjetoModal.style.display = "block";
};

closeCriarProjetoModal.onclick = function () {
  criarProjetoModal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target === criarProjetoModal) {
    criarProjetoModal.style.display = "none";
  }
};

// Modal Editar:

const editarProjetoModal = document.getElementById("editarProjetoModal");
const editarProjetoButton = document.getElementById("editarProjetoButton");
const closeEditarProjetoModal = document.getElementById(
  "closeEditarProjetoModal"
);

editarProjetoButton.onclick = function () {
  editarProjetoModal.style.display = "block";
};

closeEditarProjetoModal.onclick = function () {
  editarProjetoModal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target === editarProjetoModal) {
    editarProjetoModal.style.display = "none";
  }
};

// Modal Deletar:
const deletarProjetoModal = document.getElementById("deletarProjetoModal");
const deletarProjetoButton = document.getElementById("deletarProjetoButton");
const closeDeletarProjetoModal = document.getElementById(
  "closeDeletarProjetoModal"
);

deletarProjetoButton.onclick = function () {
  deletarProjetoModal.style.display = "block";
};

closeDeletarProjetoModal.onclick = function () {
  deletarProjetoModal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target === deletarProjetoModal) {
    deletarProjetoModal.style.display = "none";
  }
};

//

//Modal Ver Inscritos Bolsa

const verInscritosBolsaModal = document.getElementById("inscritosBolsaModal");
const verInscritosBolsaModalButton = document.getElementById(
  "verInscritosBolsaButton"
);
const closeVerInscritosBolsaModal = document.getElementById(
  "closeVerInscritosBolsaModal"
);

verInscritosBolsaModalButton.onclick = function () {
  console.log("teste222");
  verInscritosBolsaModal.style.display = "block";
};

closeVerInscritosBolsaModal.onclick = function () {
  console.log("clicou");
  verInscritosBolsaModal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target === verInscritosBolsaModal) {
    verInscritosBolsaModal.style.display = "none";
  }
};

// Dropdown criar
document.addEventListener("DOMContentLoaded", function () {
  const dropdownButton = document.getElementById("dropdownMenuButton");
  const checkboxes = document.querySelectorAll('input[name="cursosAceitos"]');

  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", updateSelectedCourses);
  });

  function updateSelectedCourses() {
    const selected = Array.from(checkboxes)
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => checkbox.value);

    dropdownButton.innerHTML =
      selected.length > 0 ? selected.join(", ") : "Selecione os cursos aceitos";
  }

  dropdownButton.addEventListener("click", function (event) {
    event.stopPropagation();
    const dropdownMenu = this.nextElementSibling;
    dropdownMenu.style.display =
      dropdownMenu.style.display === "block" ? "none" : "block";
  });

  document.addEventListener("click", function (event) {
    const dropdownMenu = dropdownButton.nextElementSibling;
    if (
      dropdownMenu.style.display === "block" &&
      !dropdownButton.contains(event.target) &&
      !dropdownMenu.contains(event.target)
    ) {
      dropdownMenu.style.display = "none";
    }
  });
});

//dropdown editar
document.addEventListener("DOMContentLoaded", function () {
  const dropdownButton = document.getElementById("dropdownMenuButtonEditar");
  const checkboxes = document.querySelectorAll('input[name="cursosAceitos"]');

  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", updateSelectedCourses);
  });

  function updateSelectedCourses() {
    const selected = Array.from(checkboxes)
      .filter((checkbox) => checkbox.checked)
      .map((checkbox) => checkbox.value);

    dropdownButton.innerHTML =
      selected.length > 0 ? selected.join(", ") : "Selecione os cursos aceitos";
  }

  dropdownButton.addEventListener("click", function (event) {
    event.stopPropagation();
    const dropdownMenu = this.nextElementSibling;
    dropdownMenu.style.display =
      dropdownMenu.style.display === "block" ? "none" : "block";
  });

  document.addEventListener("click", function (event) {
    const dropdownMenu = dropdownButton.nextElementSibling;
    if (
      dropdownMenu.style.display === "block" &&
      !dropdownButton.contains(event.target) &&
      !dropdownMenu.contains(event.target)
    ) {
      dropdownMenu.style.display = "none";
    }
  });
});
