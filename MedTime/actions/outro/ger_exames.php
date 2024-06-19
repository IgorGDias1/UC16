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

    <link rel="shortcut icon" type="image/png" href="../img/favico.png">


</head>

<body>

    <!-- Container principal -->
    <div class="container-fluid mt-5">

        <div class="container mt-5">
            <?php
            include_once("../../includes/navbargerente.include.php");
            ?>
            <!-- Container de gerenciamento de exames -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="container-sm">
                        <h4 class="mb-4 text-center">Gerenciamento de Exames</h4>

                        <table class="table table-striped table-hover table-primary ">
                            <thead>
                                <tr>
                                    <th hidden>ID</th>
                                    <th>Nome do Exame</th>
                                    <th>Funcionário Responsável</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($lista_exames as $exame) { ?>
                                    <tr>
                                        <td hidden><?= $exame['id']; ?></td>
                                        <td><?= $exame['nome']; ?></td>
                                        <td hidden><?= $exame['id_responsavel']; ?></td>
                                        <td><?= $exame['funcionario_resp']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" data-id="<?= $exame['id']; ?>" data-nome="<?= $exame['nome']; ?>" data-id_resp="<?= $exame['id_responsavel']; ?>" data-funcionario_resp="<?= $exame['funcionario_resp']; ?>">
                                                <i class="bi bi-pencil-square"></i> Editar</button>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="excluirExame(<?= $exame['id']; ?>)">
                                                <i class="bi bi-file-earmark-x"></i> Excluir
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCadastroExame"><i class="bi bi-plus-circle"></i> Cadastrar Exame</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PUXAR INCLUDE DOS MODAIS DE GERENCIAMENTO -->
    <?php include_once('../../includes/modais_gerenciamento.include.php') ?>



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
    </script>


</body>