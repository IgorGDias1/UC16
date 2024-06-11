<?php

session_start();

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
            <!-- CARD DO TIPO DE CONSULTA -->
            <div class="card mb-4 ms-4 me-4 clicavelhover ">
                <div class="card-body">
                    <a href="agendamentos.php" class="stretched-link text-decoration-none">
                        <h5 class="card-title">Ginecologista</h5>
                        <p class="card-text">Médico especializado na saúde do sistema reprodutor feminino</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <!-- CARD DO TIPO DE CONSULTA -->
            <div class="card mb-4 ms-4 me-4 clicavelhover">
                <div class="card-body">
                    <a href="agendamentos.php" class="stretched-link text-decoration-none">
                        <h5 class="card-title">Otorrinolaringologista</h5>
                        <p class="card-text">Médico especializado no diagnóstico e tratamento de doenças do ouvido, nariz, garganta, e das estruturas da cabeça e pescoço.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <!-- CARD DO TIPO DE CONSULTA -->
            <div class="card mb-4 ms-4 me-4 clicavelhover">
                <div class="card-body">
                    <a href="agendamentos.php" class="stretched-link text-decoration-none">
                        <h5 class="card-title">Oftalmologista</h5>
                        <p class="card-text">Médico especialista em prevenir e tratar problemas dos olhos e estruturas anexas.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <!-- CARD DO TIPO DE CONSULTA -->
            <div class="card mb-4 ms-4 me-4 clicavelhover">
                <div class="card-body">
                    <a href="agendamentos.php" class="stretched-link text-decoration-none">
                        <h5 class="card-title">Psiquiatra </h5>
                        <p class="card-text">Médico que trata da prevenção, diagnóstico e tratamento dos sofrimentos mentais de cunho orgânico ou funcional.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Linha do Rodapé -->
    <div class="row rodape justify-content-center pb-3">
        <div class="col-md-4 mt-4 ms-3">
            <p class="h2">Contatos</p><br>
            <p><i class="bi bi-instagram fs-5"></i>ﾠ@medtime</p>
            <p><i class="bi bi-envelope fs-5"></i>ﾠmedtime@gmail.com</p>
            <p><i class="bi bi-whatsapp fs-5"></i>ﾠ(12)98334-1234</p>
        </div>

        <div class="col-md-4 mt-4">
            <p class="h2">Profissionais</p><br>
            <p>Otorrinolaringologista</p>
            <p>Oftalmologista</p>
            <p>Psiquiatra</p>
            <p>Entre outros</p>
        </div>

        <div class="col-md-2 mt-4">
            <p class="h2">Institucional</p><br>
            <p>Quem Somos</p>
            <p>Sobre os Exames</p>
            <p>Opiniões Médicas</p>
            <p>Política de Privacidade</p>
        </div>

    </div>
    <!-- Linha do Rodapé 2 -->
    <div class="row bg-black">
        <div class="col py-3 ms-2">
            <span class="text-light ">Copyright MedTime Agendamentos Online-2032. Todos os direitos reservados</span>
        </div>
    </div>



    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- puxar js -->
    <script src="CSS_e_JS/script.js"></script>

</body>

</html>