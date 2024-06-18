<?php

session_start();

require_once('classes/Exame.class.php');
$exame = new Exame();

$listarExames = $exame->Listar();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/png" href="img/favico.png">
    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="CSS_e_JS/style.css">
    <!-- Movimento logo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- api google fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Amatic+SC:wght@400;700&family=Bungee&family=Bungee+Spice&family=Press+
    Start+2P&family=Righteous&family=Rubik+Doodle+Shadow&family=Uchen&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <?php
        $paginaAtiva = "2";
        include_once("includes/elementos.include.php");
        ?>


        <div class="row mt-3">
            <div class="col ms-4">
                <h1>Selecione a Consulta:</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <?php foreach($listarExames as $e) { ?>
                <!-- CARD DO TIPO DE CONSULTA -->
                <div class="card mb-4 ms-4 me-4 clicavelhover ">
                    <div class="card-body">
                        <a href="agendamentos.php?id=<?=$e['id'];?>" class="stretched-link text-decoration-none">
                            <h5 class="card-title"><?=$e['nome'];?></h5>
                            <p class="card-text">Médico responsável: <?=$e['funcionario_resp'];?></p>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <?php
            include_once("includes/rodape.include.php");
            ?>
       
    </div>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- puxar js -->
    <script src="CSS_e_JS/script.js"></script>

    <?php include_once('includes/alertas.include.php'); ?>

</body>

</html>