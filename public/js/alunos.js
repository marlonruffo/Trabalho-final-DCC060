// Seleção dos elementos do modal de visualização de bolsa
const visualizarAlunoModal = document.getElementById("visualizarAlunoModal");
const verAlunoButton = document.getElementById("verAlunoButton");
const closeVisualizarAlunoModal = document.getElementById("closeVisualizarAlunoModal");

// Função para abrir o modal de visualização
verAlunoButton.onclick = function() {
    visualizarAlunoModal.style.display = "block";
}

// Função para fechar o modal de visualização
closeVisualizarAlunoModal.onclick = function() {
    visualizarAlunoModal.style.display = "none";
}

// Fechar o modal quando o usuário clicar fora dele
window.onclick = function(event) {
    if (event.target === visualizarAlunoModal) {
        visualizarAlunoModal.style.display = "none";
    }
}
