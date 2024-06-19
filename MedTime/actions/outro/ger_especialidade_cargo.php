<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['id_cargo'] == "") {
    //Retornar a tela de login
    header('Location: ../login/index.php');
    die();
}

require_once('../../classes/Convenio.class.php');
$convenio = new Convenio();
$lista_convenios = $convenio->Listar();

require_once('../../classes/Cargos.class.php');
$cargo = new Cargos();
$lista_cargos = $cargo->Listar();

require_once('../../classes/Especialidade.class.php');
$especialidade = new Especialidade();
$lista_especialidades = $especialidade->Listar();

require_once('../../classes/Exame.class.php');
$exame = new Exame();
$lista_exames = $exame->Listar();

require_once("../../classes/Usuario.class.php");
$u = new Usuario();
$listar_medicos = $u->ListarMedicos();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento Extra</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootsstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="shortcut icon" type="image/png" href="../../img/favico.png">
</head>

<body>

    <!-- Container principal -->
    <div class="container-fluid mt-5">

        <div class="container mt-5">
            <?php
            include_once("../../includes/navbargerente.include.php");
            ?>

            <?php if ($_SESSION['usuario']['id_cargo'] == 5) { ?>

                <!-- Container de gerenciamento de cargos -->
                <div class="row mt-3">

                    <div class="col-12 col-md-4">
                        <div class="container-sm mt-5">
                            <h4 class="mb-4">Gerenciamento de Cargos</h4>
                            <table class="table table-striped table-hover table-primary ">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th>Nome do Cargo</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista_cargos as $cargo) { ?>
                                        <tr>
                                            <td hidden><?= $cargo['id']; ?></td>
                                            <td><?= $cargo['nome']; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicaoCargo" data-id="<?= $cargo['id']; ?>" data-nome="<?= $cargo['nome']; ?>">
                                                    <i class="bi bi-pencil-square"></i> Editar</button>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm" onclick="excluirCargo(<?= $cargo['id']; ?>)">
                                                    <i class="bi bi-file-earmark-x"></i> Excluir
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>


                    <!-- Container de gerenciamento de especialidade -->
                    <div class="col-12 col-md-8">
                        <div class="container-sm mt-5">
                            <h4 class="mb-4">Gerenciamento de Especialidade</h4>
                            <table class="table table-striped table-hover table-primary ">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th>Nome da Especialidade</th>
                                        <th>Nome do Cargo</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($lista_especialidades as $especialidade) { ?>
                                        <tr>
                                            <td hidden><?= $especialidade['id']; ?></td>
                                            <td><?= $especialidade['especificacao']; ?></td>
                                            <td hidden><?= $especialidade['id_cargo']; ?></td>
                                            <td><?= $especialidade['nome']; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicaoEspecialidade" data-id_especialidade="<?= $especialidade['id']; ?>" data-especificacao="<?= $especialidade['especificacao']; ?>" data-id_cargo="<?= $especialidade['id_cargo']; ?>">
                                                    <i class="bi bi-pencil-square"></i> Editar</button>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm" onclick="excluirEspecialidade(<?= $especialidade['id']; ?>)">
                                                    <i class="bi bi-file-earmark-x"></i> Excluir
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="modal fade" id="modalEdicaoCargo" tabindex="-1" role="dialog" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../cargos/editar_cargo.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEdicaoLabel">Edição de Cargo</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="id" name="id" id="id">
                            <div class="form-group">
                                <input type="text" class="form-control cargo" id="nome" name="nome">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        <div class="modal fade" id="modalEdicaoEspecialidade" tabindex="-1" role="dialog" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../especialidades/editar_especialidade.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEdicaoLabel">Edição de Especialidade</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="id_especialidade" name="id_especialidade" id="id_especialidade">
                            <div class="form-group">
                                <label for="especialidade">Nome Especialidade</label>
                                <input type="text" class="form-control especificacao" id="especificacao" name="especificacao">
                            </div>
                            <div class="form-group mt-3">
                                <label for="cargo">Cargo da especialidade</label>
                                <br>
                                <select class="form-control id_cargo" id="id_cargo" name="id_cargo">
                                    <?php foreach ($lista_cargos as $c) { ?>
                                        <option value="<?= $c['id']; ?>"><?= $c['nome']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <?php include_once('../../includes/alertas.include.php') ?>

    <script src="script.js"></script>
    <script src="../especialidades/script.js"></script>
    <script src="../cargos/script.js"></script>
    <script src="../exames/script.js"></script>

    <script>
        $('#responsavel').select2({
            dropdownParent: $('#modalCadastroExame')
        });
    </script>

    <script>
        function excluirEspecialidade(id) {
            Swal.fire({
                title: "Tem certeza?",
                text: "Não será possível desfazer essa ação!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim, apagar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../especialidades/deletar_especialidade.php?id=' + id;
                }
            });
        }

        function excluirCargo(id) {
            Swal.fire({
                title: "Tem certeza?",
                text: "Não será possível desfazer essa ação!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim, apagar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../cargos/deletar_cargo.php?id=' + id;
                }
            });
        }

        $('#modalEdicaoCargo').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var cargo = button.data('nome')

            var modal = $(this)

            modal.find('.id').val(id)
            modal.find('.cargo').val(cargo)

        })

        $('#modalEdicaoEspecialidade').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget)

            var id = button.data('id_especialidade')
            var especificacao = button.data('especificacao')
            var id_cargo = button.data('id_cargo')

            var modal = $(this)

            modal.find('.id_especialidade').val(id)
            modal.find('.especificacao').val(especificacao)
            modal.find('.id_cargo').val(id_cargo)

        })
    </script>

</body>