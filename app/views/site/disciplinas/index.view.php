<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bolsa fácil</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../public/css/disciplina.css">


</head>

<body>
  <Section class="bolsas">
    <h1 class="titulo">Minhas disciplinas concluídas</h1>

    <button type="" class="btn btn-primary botaoenviar mx-auto btncriar" id="criarDisciplinaButton">Adicionar
        Disciplina</button>

    
    <table class="table table-striped tabela">
      <thead>
        
      <tr class="legenda">
          <th scope="col">Código</th>
          <th scope="col">Nome</th>
          <th scope="col">Pré-Requisitos</th>
          <th scope="col">Carga horária (horas)</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
    
      <tbody>
        <?php foreach($preRequisitos as $preRequisito): ?>
        <tr>
          <th scope="row"><?= $preRequisito->CodigoDisciplina ?></th>
          <td><?= $preRequisito->NomeDisciplina ?></td>
          <td><?= $preRequisito->IdPreRequisito ?></td>
          <td><?= $preRequisito->CargaHoraria ?></td> 
          <td><button type="button" class="btn btn-secondary botaotabela" id="deletarDisciplinaButton"><ion-icon
            name="trash-bin-outline"></ion-icon></button></td>
        </tr>
        <?php endforeach; ?> 
      </tbody>
    </table>

  </Section>



<!-- modal adicionar disciplinas -->

<div id="disciplinasModal" class="modal">
    <div class="modal-content">
        <div class="container-close">
            <span class="close" id="closeDisciplinasModal">&times;</span>
        </div>
        <h2>Adicionar disciplinas</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="inputDisciplinas">Disciplinas:</label>
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="dropdownMenuButton">
                        Selecione as disciplinas que você ja concluiu
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <label class="dropdown-item">
                            <input type="checkbox" name="disciplinas" value="Disciplina 1"> COD - NOME
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" name="disciplinas" value="Disciplina 2"> COD - NOME
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" name="disciplinas" value="Disciplina 3"> COD - NOME
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" name="disciplinas" value="Disciplina 4"> COD - NOME
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" name="disciplinas" value="Disciplina 5"> COD - NOME
                        </label>
                        <label class="dropdown-item">
                            <input type="checkbox" name="disciplinas" value="Disciplina 6"> COD - NOME
                        </label>
                    </div>
                </div>
                <small class="form-text text-muted">Selecione uma ou mais disciplinas.</small>
            </div>
            
        </div>
        <div class="form-row">
            <div class="form-group button-container
            ">
            <button type="button" class="btn btn-primary botaoenviar mx-auto inscrever" id="adicionarDisciplinaButton">Adicionar</button>
            
        </div>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="../../../public/js/disciplinas.js"></script>
<!--  -->
</body>

</html>