<?php

session_start();

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id_cargo'] != "") {
    echo '<script src="text/javascript">', 'loginUsuario();', '</script>';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedTime</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" type="image/png" href="img/favico.png">

    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="CSS_e_js/style.css">

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
        $paginaAtiva = "1";
        include_once("includes/elementos.include.php");
        ?>

        <!-- Linha do Carousel -->
        <div class="container-fluid">
            <div class="row mx-4 p-3">
                <div class="col justify-content-center">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="img/carrosel.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="img/carrosel2.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Botões de informação -->
        <div class="container-fluid align-items-center text-center">
            <div class="row px--md5">
                <div class="col-md-4 mt-4">
                    <div class="card mb-3 bg-transparent border-0 align-items-center">
                        <img src="img/cruz.png" class="card-img-top w-25" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Agende seus exames aqui</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <div class="card mb-3 bg-transparent border-0 align-items-center">
                        <img src="img/med.png" class="card-img-top w-25" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Com médicos de confiança</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-4">
                    <div class="card mb-3 bg-transparent border-0 align-items-center ">
                        <img src="img/exame-medico(1).png" class="card-img-top w-25" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">E resultados com mais facilidade</h5>
                        </div>
                    </div>
                </div>

                <!-- Linha do Corpo -->
                <div class="row">
                    <div class="col-md-4 mt-3 mb-3 px-5">
                        <img src="img/medica.jpg" class="d-block w-100 rounded-5" alt="Medtime">
                    </div>
                    <div class="col-md-6 mt-3 px-5">
                        <p class="h2">Quem Somos</p>
                        <p class="text-md-start"> Na MedTime, nosso propósito é simplificar e otimizar o processo de agendamento
                            e gerenciamento de
                            consultas médicas. Somos uma empresa dedicada a fornecer soluções inovadoras e eficientes para
                            facilitar o acesso dos pacientes aos cuidados de saúde de que necessitam. </br>
                            Além de fornecer soluções de agendamento e gerenciamento de consultas, também nos preocupamos
                            profundamente com o bem-estar de nossa comunidade. Estamos envolvidos em iniciativas locais e
                            globais que visam promover a saúde e o acesso igualitário aos cuidados médicos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once("includes/rodape.include.php");
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- puxar js -->
    <script src="CSS_e_JS/script.js"></script>


    <?php include_once('includes/alertas.include.php'); ?>


</body>

</html>