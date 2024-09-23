
const visualizarProjetoModal = document.getElementById("visualizarProjetoModal");
const verProjetoButton = document.getElementById("verProjetoButton");
const closeVisualizarProjetoModal = document.getElementById("closeVisualizarProjetoModal");


verProjetoButton.onclick = function() {
    visualizarProjetoModal.style.display = "block";
}


closeVisualizarProjetoModal.onclick = function() {
    visualizarProjetoModal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target === visualizarProjetoModal) {
        visualizarProjetoModal.style.display = "none";
    }
}
