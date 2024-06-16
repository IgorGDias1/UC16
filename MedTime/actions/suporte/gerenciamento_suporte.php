<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['id_cargo'] == "") {
    //Retornar a tela de login
    header('Location: ../login/index.php');
    die();
}

require_once('../../classes/Suporte.class.php');

$suporte = new Suporte();
$listarPendentes = $suporte->ListarPendentes();
$listarTudo = $suporte->Listar();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Endereço</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootsstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" type="image/png" href="../img/favico.png">

</head>

<body>

    <?php
        include_once("../../includes/navbargerente.include.php"); 
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Gerenciamento de Suporte</h2>
        <table class="table table-striped table-hover mt-2">
            <div class="d-flex justify-content-end">
                <h4>Suportes Pendentes</h4>
            </div>
            <thead>
                <tr>
                    <th hidden>ID</th>
                    <th>Solicitante</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                    <th hidden>Situação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listarPendentes as $s) { ?>
                    <tr>
                        <td hidden><?= $s['id_suporte']; ?></td>
                        <td><?= $s['solicitante']; ?></td>
                        <td><?= $s['assunto']; ?></td>
                        <td><?= $s['mensagem']; ?></td>
                        <td hidden><?= $s['situacao']; ?></td>
                        <td><a href="#" class="btn btn-success btn-sm" onclick="finalizarSuporte(<?= $s['id_suporte']; ?>)">
                                <i class="bi bi-file-earmark-x"></i> Concluir Suporte
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


        <br><hr><br>
        <table class="table table-striped table-hover mt-2">
            <h4 class="mt-5">Todos os suportes</h4>
            <thead>
                <tr>
                    <th hidden>ID</th>
                    <th>Solicitante</th>
                    <th>Assunto</th>
                    <th>Mensagem</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listarTudo as $sT) { ?>
                    <tr>
                        <td hidden><?= $s['id_suporte']; ?></td>
                        <td><?= $sT['solicitante']; ?></td>
                        <td><?= $sT['assunto']; ?></td>
                        <td><?= $sT['mensagem']; ?></td>
                        <td><?= $sT['situacao']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <?php include_once('../../includes/alertas.include.php') ?>

    <script src="script.js"></script>

    <script>
    function finalizarSuporte(id){
        Swal.fire({
        title: "Tem certeza?",
        text: "A situação poderá ser revertida!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sim!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='atender_suporte.php?id=' + id;
            }
        });
    }
    </script>

</body>

</html>