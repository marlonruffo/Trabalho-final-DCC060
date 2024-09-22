
// Seleção dos elementos do modal de visualização de bolsa
const disciplinasModal = document.getElementById("disciplinasModal");
const criarDisciplinaButton = document.getElementById("criarDisciplinaButton");
const closeDisciplinasModal = document.getElementById("closeDisciplinasModal");


// Função para abrir o modal de visualização
criarDisciplinaButton.onclick = function() {

    disciplinasModal.style.display = "block";
}

closeDisciplinasModal.onclick = function() {
    
    disciplinasModal.style.display = "none";
}


// Fechar o modal quando o usuário clicar fora dele
window.onclick = function(event) {
    if (event.target === disciplinasModal) {
        disciplinasModal.style.display = "none";
    }
}




document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownMenuButton");
    const checkboxes = document.querySelectorAll('input[name="disciplinas"]');
  
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