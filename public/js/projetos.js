// Seleção dos elementos do modal de visualização de bolsa
const visualizarProjetoModal = document.getElementById("visualizarProjetoModal");
const verProjetoButton = document.getElementById("verProjetoButton");
const closeVisualizarProjetoModal = document.getElementById("closeVisualizarProjetoModal");

// Função para abrir o modal de visualização
verProjetoButton.onclick = function() {
    visualizarProjetoModal.style.display = "block";
}

// Função para fechar o modal de visualização
closeVisualizarProjetoModal.onclick = function() {
    visualizarProjetoModal.style.display = "none";
}

// Fechar o modal quando o usuário clicar fora dele
window.onclick = function(event) {
    if (event.target === visualizarProjetoModal) {
        visualizarProjetoModal.style.display = "none";
    }
}
