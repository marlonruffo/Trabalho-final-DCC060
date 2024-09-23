
// Seleção dos elementos do modal de visualização de bolsa
const visualizarPSModal = document.getElementById("visualizarPSModal");
const verPSButton = document.getElementById("verPSButton");
const closeVisualizarPSModal = document.getElementById("closeVisualizarPSModal");


// Função para abrir o modal de visualização
verPSButton.onclick = function() {

    visualizarPSModal.style.display = "block";
}

closeVisualizarPSModal.onclick = function() {
    
    visualizarPSModal.style.display = "none";
}



window.onclick = function(event) {
    if (event.target === visualizarPSModal) {
        visualizarPSModal.style.display = "none";
    }
}