
const visualizarProjetoModal = document.getElementById(
  "visualizarProjetoModal"
);

const modais = document.querySelectorAll(".modal");


const closeModal = document.querySelectorAll(".close");


const verProjetoButtons = document.querySelectorAll(".verProjetoButton");


verProjetoButtons.forEach((button) => {
  button.onclick = function () {
    const modalId = button.getAttribute("data-modal");

    const visualizarProjetoModal = document.getElementById(modalId);

    visualizarProjetoModal.style.display = "block";
  };
});

closeModal.forEach((button) => {
  button.onclick = function () {
    modais.forEach((modal) => {
      modal.style.display = "none";
    });
  };
});


window.onclick = function (event) {
  if (event.target === visualizarProjetoModal) {
    visualizarProjetoModal.style.display = "none";
  }
};


const editarProjetoModal = document.getElementById("editarProjetoModal");
const editarProjetoButtons = document.querySelectorAll(".editarProjetoButton");
const deleteProjetoButtons = document.querySelectorAll(".deletarProjetoButton");

const closeEditarProjetoModal = document.getElementById(
  "closeEditarProjetoModal"
);

editarProjetoButtons.forEach((button) => {
  button.onclick = function () {
    const modalId = button.getAttribute("data-modal");

    const editarProjetoModal = document.getElementById(modalId);

    editarProjetoModal.style.display = "block";
  };
});

deleteProjetoButtons.forEach((button) => {
  button.onclick = function () {
    const modalId = button.getAttribute("data-modal");

    const deletarProjetoModal = document.getElementById(modalId);

    deletarProjetoModal.style.display = "block";
  };
});

window.onclick = function (event) {
  if (event.target === editarProjetoModal) {
    editarProjetoModal.style.display = "none";
  }
};

const deletarProjetoModal = document.getElementById("deletarProjetoModal");
const deletarProjetoButtons = document.querySelectorAll(
  ".deletarProjetoButton"
);
const closeDeletarProjetoModal = document.getElementById(
  "closeDeletarProjetoModal"
);

window.onclick = function (event) {
  if (event.target === deletarProjetoModal) {
    deletarProjetoModal.style.display = "none";
  }
};

const criarProjetoModal = document.getElementById("criarProjetoModal");

const criarProjetoButton = document.getElementById("criarProjetoButton");
const closeCriarProjetoModal = document.getElementById(
  "closeCriarProjetoModal"
);

criarProjetoButton.onclick = function () {
  criarProjetoModal.style.display = "block";
};

window.onclick = function (event) {
  if (event.target === criarProjetoModal) {
    criarProjetoModal.style.display = "none";
  }
};
