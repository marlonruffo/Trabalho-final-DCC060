
const visualizarAlunoModal = document.getElementById("visualizarAlunoModal");
const verAlunoButton = document.getElementById("verAlunoButton");
const closeVisualizarAlunoModal = document.getElementById("closeVisualizarAlunoModal");


verAlunoButton.onclick = function() {
    visualizarAlunoModal.style.display = "block";
}


closeVisualizarAlunoModal.onclick = function() {
    visualizarAlunoModal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target === visualizarAlunoModal) {
        visualizarAlunoModal.style.display = "none";
    }
}
