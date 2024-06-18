<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: actions/login/index.php');
    die();
}

if (!isset($_GET['id'])) {
    header('Location: perfil.php');
}

require_once('classes/Usuario.class.php');

$usuario = new Usuario();
$usuario->id = $_SESSION['usuario']['id'];

$info = $usuario->ListarPorId();

require_once('classes/Agendamento.class.php');
$agendamento = new Agendamento();
$agendamento->id = $_GET['id'];

$agendamentoListar = $agendamento->ListarPorID();


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
    <link rel="stylesheet" href="CSS_e_JS/style.css">

    <!-- Movimento logo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <!-- Removendo a setinha do input number -->
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>




    <!-- api google fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Amatic+SC:wght@400;700&family=Bungee&family=Bungee+Spice&family=Press+
        Start+2P&family=Righteous&family=Rubik+Doodle+Shadow&family=Uchen&display=swap" rel="stylesheet">
</head>

<body>



    <div class="container-fluid ">
        <?php
        $paginaAtiva = "2";
        include_once("includes/elementos.include.php");
        ?>
        
        <p class="h4 mt-5 text-center"><b>Agendamento</b></p>
        <div class="col-12">
            <?php foreach ($agendamentoListar as $infoA) { ?>
                <div class="form-floating">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" aria-label=".form-control-lg example" value="<?= $infoA['paciente']; ?>">
                    <label for="floatingInput">Paciente</label>
                </div>

                <div class="form-floating">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" aria-label=".form-control-lg example" value="<?= $infoA['médico']; ?>">
                    <label for="floatingInput">Médico</label>
                </div>

                <div class="form-floating">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" aria-label=".form-control-lg example" value="<?= $infoA['exame']; ?>">
                    <label for="floatingInput">Exame</label>
                </div>

                <div class="form-floating">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" aria-label=".form-control-lg example" value="<?= $infoA['convenio']; ?>">
                    <label for="floatingInput">Convênio</label>
                </div>

                <div class="form-floating">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" aria-label=".form-control-lg example" value="<?= $infoA['clinica']; ?>">
                    <label for="floatingInput">Clínica</label>
                </div>

                <div class="form-floating">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" aria-label=".form-control-lg example" value="<?= $infoA['data consulta']; ?>">
                    <label for="floatingInput">Data da Consulta</label>
                </div>

                <div class="form-floating">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" aria-label=".form-control-lg example" value="<?= $infoA['situacao']; ?>">
                    <label for="floatingInput">Situação</label>
                </div>

                <?php if ($infoA['situacao'] == "Pendente") { ?>
                    <button class="btn btn-danger" onclick="cancelarAgendamento(<?= $_GET['id']; ?>)">Cancelar Agendamento</button>
                <?php } ?>
            <?php } ?>
        </div>
        
        <?php
        include_once("includes/rodape.include.php");
        ?>
    </div>


    <!-- puxar js -->
    <script src="CSS_e_JS/script.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php include_once('includes/alertas.include.php'); ?>

    <script>
        function cancelarAgendamento(id) {
            Swal.fire({
                title: "Tem certeza?",
                text: "Não será possível desfazer essa ação!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim, cancelar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'actions/agendamentos/cancelar_agendamento.php?id=' + id;
                }
            });
        }
    </script>

</body>