<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /login');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa fácil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/gerenciamento.css">


</head>

<body>
    
    <Section class="gerenciamento">
        <h1 class="titulo">Meus projetos</h1>
        <button type="" class="btn btn-primary botaoenviar mx-auto btncriar" id="criarProjetoButton">Criar
            Projeto</button>
        <table class="table table-striped tabela">
            <thead>
                <tr class="legenda">
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Título</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Data de início</th>
                    <th scope="col">Data de término</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projetos as $projeto): ?>
                    <tr>
                        <!-- <th scope="row"><?= $projeto->idProjeto ?></th> -->
                        <td><?= $projeto->titulo ?></td>
                        <td><?= $projeto->tipo_projeto ?></td>
                        <td><?= $projeto->dataInicio ?></td>
                        <td><?= $projeto->dataFim ?></td>
                        <td><?= $projeto->status ?></td>
                        <td>
                            <button type="button" class="btn btn-secondary botaotabela verProjetoButton" data-modal="visualizarProjetoModal-<?php echo $projeto->idProjeto ?>"><ion-icon name="eye-outline"></ion-icon></button>
                            <button type="button" class="btn btn-secondary botaotabela editarProjetoButton" data-modal="editarProjetoModal-<?php echo $projeto->idProjeto ?>"><ion-icon name="create-outline"></ion-icon></button>
                            <button type="button" class="btn btn-secondary botaotabela deletarProjetoButton" data-modal="deletarProjetoModal-<?php echo $projeto->idProjeto ?>"><ion-icon name="trash-bin-outline"></ion-icon></button>
                        </td>


                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </Section>

    <?php foreach ($projetos as $projeto): ?>

    <?php if($projeto->idProfessor == $_SESSION['user']['idUsuario']): ?>

        <!-- MODAL DELETAR -->
        <div id="deletarProjetoModal-<?php echo($projeto->idProjeto)?>"  class="modal">
            <div class="modal-content">
                <div class="container-close">
                    <span class="close" id="closeDeletarProjetoModal">&times;</span>
                </div>
                <h2>Deletar "<?=$projeto->titulo ?>" </h2>
                <form method="POST" action="gerenciamento/delete">
                    <input type="hidden" name="idProjeto" value="<?php echo $projeto->idProjeto ?>">
                    <button class="action-button inscrever">Deletar</button>
                </form>
            </div>
        </div>

    <?php endif; ?>
    

    <!-- MODAL VISUALIZAR -->
    <div id="visualizarProjetoModal-<?php echo($projeto->idProjeto ?? '1')?>" class="modal visualizarProjetoModalClass">
        <div class="modal-content">
            <div class="container-close">
                <span class="close" id="closeVisualizarProjetoModal">&times;</span>
            </div>
            <h2><?= $projeto->titulo ?></h2>
            <form action="" method="">
                <div class="form-row">
                    <div class="form-group">
                        <label for="readProfessor">
                            Professor responsável: 
                        </label>
                        <?php foreach($professores as $prof) : ?>
                            <?php if ($prof->idUsuario == $projeto->idProfessor) : ?>
                                <input type="text" class="form-control" id="readProfessor" value="<?= $prof->Nome ?>" readonly />
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <label for="readEmailProfessor">E-mail Professor:</label>
                        <?php foreach($professores as $prof) : ?>
                            <?php if ($prof->idUsuario == $projeto->idProfessor) : ?>
                                <input type="text" class="form-control" id="readEmailProfessor" value="<?= $prof->email ?>" readonly />
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>


                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="readDataIngresso">Data de início:</label>
                        <input type="date" class="form-control" id="readDataIngresso" value="<?=$projeto->dataInicio ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="readDataTermino">Data de término:</label>
                        <input type="date" class="form-control" id="readDataTermino" value="<?=$projeto->dataFim ?>" readonly />
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="readTipo">Tipo:</label>
                        <input class="form-control" id="readTipo" rows="3" value="<?=$projeto->tipo_projeto ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="readStatus">Status:</label>
                        <input type="text" class="form-control" id="readStatus" value="<?=$projeto->status ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="readQtdeVagas">Quantidade de vagas:</label>
                        <input type="number" class="form-control" id="readQtdeVagas" value="<?=$projeto->qtdeVagas ?>" readonly />
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group">
                        <label for="readDescricao">Descrição:</label>
                        <textarea class="form-control" id="readDescricao" rows="3" readonly><?=$projeto->descricao ?></textarea>
                    </div>
                </div>


            </form>
        </div>
    </div>
    
    <!--  -->
    <?php if($projeto->idProfessor == $_SESSION['user']['idUsuario']): ?>
    <!-- MODAL EDITAR -->
        <div id="editarProjetoModal-<?php echo($projeto->idProjeto) ?>" value="<?php echo $projeto->idProjeto ?>" class="modal">
            <div class="modal-content">
                <div class="container-close">
                    <span class="close" id="closeEditarProjetoModal">&times;</span>
                </div>
                <h2>Editar Projeto</h2>
                <form action="gerenciamento/update" method="POST">
                    
                    <input type="hidden" name="idProjeto" value="<?php echo $projeto->idProjeto ?>">
                    <input type="hidden" name="idProfessor" value="<?php echo $projeto->idProfessor ?>">

                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputProfessorEditar">Professor responsável:</label>
                            <?php foreach($professores as $prof) : ?>
                                <?php if ($_SESSION['user']['idUsuario'] == $prof->idUsuario) : ?>
                                    <input type="text" class="form-control" id="inputProfessorEditar" name="professor" value="<?= $prof->Nome ?>" readonly />
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="inputEmailProfessorEditar">E-mail Professor:</label>
                            <?php foreach($professores as $prof) : ?>
                                <?php if ($_SESSION['user']['idUsuario'] == $prof->idUsuario) : ?>
                                    <input type="text" class="form-control" id="inputEmailProfessorEditar" name="emailProfessor" value="<?= $prof->email ?>" readonly />
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputTituloEditar">Titulo:</label>
                            <input type="text" class="form-control" id="inputTituloEditar" name="titulo" value="<?php echo $projeto->titulo ?>" />
                        </div>
                        <div class="form-group">
                            <label for="inputQtdeVagasEditar">Quantidade de vagas:</label>
                            <input type="number" class="form-control" id="inputQtdeVagasEditar" name="qtdeVagas" value="<?php echo $projeto->qtdeVagas ?>" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputDataIngressoEditar">Data de início:</label>
                            <input type="date" class="form-control" id="inputDataIngressoEditar" name="dataInicio" value="<?php echo $projeto->dataInicio ?>" />
                        </div>
                        <div class="form-group">
                            <label for="inputDataTerminoEditar">Data de término:</label>
                            <input type="date" class="form-control" id="inputDataTerminoEditar" name="dataFim" value="<?php echo $projeto->dataFim ?>" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputTipoEditar">Tipo:</label>
                            <select class="form-control" id="inputTipoEditar" name="tipo">
                                <option value="iniciacaoCientifica" <?php echo $projeto->tipo_projeto == 'iniciacaoCientifica' ? 'selected' : '' ?>>Iniciação Científica</option>
                                <option value="pesquisa" <?php echo $projeto->tipo_projeto == 'pesquisa' ? 'selected' : '' ?>>Pesquisa</option>
                                <option value="extensao" <?php echo $projeto->tipo_projeto == 'extensao' ? 'selected' : '' ?>>Extensão</option>
                                <option value="outrasAtividades" <?php echo $projeto->tipo_projeto == 'outrasAtividades' ? 'selected' : '' ?>>Outras Atividades</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputStatusEditar">Status:</label>
                            <select class="form-control" id="inputStatusEditar" name="status">
                                <option value="ativo" <?php echo $projeto->status == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                                <option value="concluido" <?php echo $projeto->status == 'concluido' ? 'selected' : '' ?>>Concluído</option>
                                <option value="emAndamento" <?php echo $projeto->status == 'emAndamento' ? 'selected' : '' ?>>Em Andamento</option>
                                <option value="cancelado" <?php echo $projeto->status == 'cancelado' ? 'selected' : '' ?>>Cancelado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputDescricaoEditar">Descrição:</label>
                            <textarea class="form-control" id="inputDescricaoEditar" name="descricao" rows="3"><?php echo $projeto->descricao ?></textarea>
                        </div>
                    </div>

                    <div class="button-container">
                        <button type="submit" class="action-button inscrever" id="editarProjeto">
                            Editar Projeto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <?php endforeach; ?>


    <!-- MODAL CRIAR -->
    <div id="criarProjetoModal" class="modal">
        <form class="modal-content" action="gerenciamento/store" method="POST">
            <div class="container-close">
                <span class="close" id="closeCriarProjetoModal">&times;</span>
            </div>
            <h2>Criar Projeto</h2>
            <div class="form-row">
                <input type="hidden" name="idProfessor" value="<?= $_SESSION['user']['idUsuario'] ?>">
                <div class="form-group">
                    <label for="inputProfessor">Professor responsável:</label>
                    <?php foreach($professores as $prof) : ?>
                        <?php if ($_SESSION['user']['idUsuario'] == $prof->idUsuario) : ?>
                            <input type="text" class="form-control" id="inputProfessor" value="<?= $prof->Nome ?>" readonly />
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="form-group">
                    <label for="inputEmailProfessor">E-mail Professor:</label>
                    <?php foreach($professores as $prof) : ?>
                        <?php if ($_SESSION['user']['idUsuario'] == $prof->idUsuario) : ?>
                            <input type="text" class="form-control" id="inputEmailProfessor" value="<?= $prof->email ?>" readonly />
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="inputProfessor">Titulo:</label>
                    <input type="text" class="form-control" id="inputProfessor" name="titulo"/>
                </div>
                <div class="form-group">
                    <label for="inputQtdeVagas">Quantidade de vagas:</label>
                    <input type="number" class="form-control" id="inputQtdeVagas" name="qtdeVagas" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="inputDataIngresso">Data de início:</label>
                    <input type="date" class="form-control" id="inputDataIngresso" name="dataInicio" />
                </div>
                <div class="form-group">
                    <label for="inputDataTermino">Data de término:</label>
                    <input type="date" class="form-control" id="inputDataTermino" name="dataFim" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="inputTipo">Tipo:</label>
                    <select class="form-control" id="inputTipo" name="tipo">
                        <option value="iniciacaocientifica">Iniciação Científica</option>
                        <option value="monitoria">Monitoria</option>
                        <option value="extensao">Extensão</option>
                        <option value="treinamentoprofissional">Treinamento Profissional</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputStatus">Status:</label>
                    <select class="form-control" id="inputStatus" name="status">
                        <option value="ativo">Ativo</option>
                        <option value="concluido">Concluído</option>
                        <option value="emAndamento">Em Andamento</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="inputDescricao">Descrição:</label>
                    <textarea class="form-control" id="inputDescricao" name="descricao" rows="3"></textarea>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" class="action-button inscrever" id="criarProjeto">
                    Criar Projeto
                </button>
            </div>
        </form>
    </div>
    <!--  -->

   

    <script src="../../../public/js/gerenciamento.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>