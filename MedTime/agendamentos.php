<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: consultas.php?neutro=logar');
}

if(!isset($_GET['id'])){
    header('Location: consultas.php');
}

$data = new DateTime();
$dataMin = new DateTime('2024-01-01');



require_once('classes/Exame.class.php');
$exame = new Exame();
$exame->id = $_GET['id'];

$listarExame = $exame -> ListarPorID();

require_once('classes/Usuario.class.php');
$usuario = new Usuario();
$usuario->id = $_SESSION['usuario']['id'];

$usuarioInfo = $usuario->ListarPorID();

require_once('classes/Localizacao.class.php');
$localizacao = new Localizacao();

$listarClinicas = $localizacao->ListarClinicas();

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
<?php date_default_timezone_set('America/Sao_Paulo') ?>


    <div class="container-fluid">
    <?php 
       $paginaAtiva = "3";
       include_once("includes/elementos.include.php");
       ?>

        <!-- Linha da tabela de agendamentos -->
        <div class="row justify-content-center">
            <div class="col-md-6 rounded-3  mb-2 ">
                <p class="h2 text-center mt-3">Agendamentos</p>
                <form action="actions/agendamentos/cadastrar_agendamento_cliente.php" method="POST">
                    <!-- foreach com as informações do exame -->
                    <?php foreach($listarExame as $e) { ?>
                        <!-- foreach com as informações do usuário -->
                        <?php foreach($usuarioInfo as $u) { ?>

                        <div class="form-floating">
                            <input type="hidden" value="<?=$_SESSION['usuario']['id'];?>" id="id_cliente" name="id_cliente">
                            <input class="form-control form-control-lg mb-2 "
                            name="nomepaciente" id="nomepaciente" type="text" aria-label=".form-control-lg example"
                            value="<?=$_SESSION['usuario']['nome']?>" readonly>
                            <label for="floatingInput">Nome do Paciente</label>
                        </div>


                        <div class="form-floating">
                            <input type="hidden" value="<?=$e['id'];?>" id="id_exame" name="id_exame">
                            <input class="form-control form-control-lg mb-2 " name="exame" id="exame" type="text" aria-label=".form-control-lg example" value="<?=$e['nome'];?>" readonly>
                            <label for="floatingInput">Exame</label>
                        </div>
                        
                        <div class="form-floating">
                            <input type="hidden" value="<?=$e['id_responsavel'];?>" id="id_funcionario" name="id_funcionario">
                            <input class="form-control form-control-lg mb-2 " 
                            name="nomemedico" id="nomemedico" 
                            type="text" aria-label=".form-control-lg example" value="<?=$e['funcionario_resp'];?>" readonly>
                            <label for="floatingInput">Médico Responsável</label>
                        </div>

                        <div class="form-floating">
                            <input type="hidden" value="<?=$u['id_convenio'];?>" id="id_convenio" name="id_convenio">
                            <input class="form-control form-control-lg mb-2 " 
                            name="convenio" id="convenio" type="text" aria-label=".form-control-lg example" value="<?=$u['convenio'];?>" readonly>
                            <label for="floatingInput">Convênio</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 mt-5" 
                            name="dataagendamento" id="dataagendamento" type="datetime-local" placeholder="Data" aria-label=".form-control-lg example" onclick="definirData()" required>
                            <label for="floatingInput">Data e horário</label>
                        </div>
                        <p class="ms-2"><i>Nosso horário de funcionamento é das 07:00h até as 21:00h</i></p>

                        <div class="form-floating">
                            
                            <select name="clinica" id="clinica" class="form-control form-control-lg mb-2">
                            <?php foreach($listarClinicas as $clinica) { ?>
                                <option value="<?=$clinica['id'];?>"><?=$clinica['complemento'];?> | 
                                <?=$clinica['logradouro'];?> - <?=$clinica['uf'];?>
                            </option>
                            <?php } ?>
                            </select>

                            <label for="floatingInput">Clínica</label>
                        </div>

                        <!-- Fim do foreach do Usuario -->
                        <?php } ?>
                        <!-- Fim do foreach de Exame -->
                    <?php } ?>
                    
                    <button type="submit" class="btn btn-primary mt-3">Agendar Consuta</button>
                    <!-- Fim do form -->
                </form>
            </div>
        </div>
        <?php
        include_once("includes/rodape.include.php");
        ?>
        
    </div>

    <?php include_once('includes/alertas.include.php'); ?>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="CSS_e_JS/script.js"></script>

    <script>
        const dateControl = document.querySelector('input[type="datetime-local"]');
        dateControl.value = "2024-06-20T07:00";

        var dataAtual = new Date().toISOString().slice(0, 16);
        document.getElementById('data').min = dataAtual
    </script>

    <script>
        function definirData() {
        const dateInput = document.getElementById('dataagendamento');


        dateInput.addEventListener('input', function() {
        const selectedDate = new Date(this.value);
        const minimumDate = new Date('2024-06-19');
        const maximumDate = new Date('2028-01-01');

        const selectedHour = selectedDate.getHours();
        const selectedDay = selectedDate.getDay();

            if (selectedDate < minimumDate || selectedDate > maximumDate) {
                this.value = ''; // Limpa o valor do input se for anterior a 2024

                Swal.fire({
                    title: "Erro!",
                    text: "Por favor selecione uma data válida",
                    icon: "error"
                });
            } 
            
            else if (selectedHour < 7 || selectedHour >= 21) {
                this.value = '';

                Swal.fire({
                title: "Erro!",
                text: "Por favor selecione um horário entre 07:00h e 21:00h",
                icon: "error"
                });
            }
            else if (selectedDay === 0 || selectedDay === 6) {
                this.value = ''; 

                Swal.fire({
                title: "Erro!",
                text: "Por favor selecione um dia entre Segunda-feira e Sexta-Feira",
                icon: "error"
                });
            }
        });
    }
    </script>
</body>

</html>