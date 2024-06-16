<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: actions/login/index.php');
}

if(!isset($_GET['id'])){
    header('Location: consultas.php');
}


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
                            <label for="floatingInput">Nome</label>
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
                            name="dataagendamento" id="dataagendamento" type="date" placeholder="Data" aria-label=".form-control-lg example">
                            <label for="floatingInput">Data de agendamento</label>
                        </div>

                        <div class="form-floating">
                            <?php foreach($listarClinicas as $clinica) { ?>
                            <select name="clinica" id="clinica" class="form-control form-control-lg mb-2">
                                <option value="<?=$clinica['id'];?>"><?=$clinica['complemento'];?></option>
                            </select>
                            <?php } ?>
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

        <!-- Linha do Rodapé -->
        <div class="row rodape justify-content-center pb-3 mt-3">
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

    </div>

    <?php include_once('includes/alertas.include.php'); ?>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="CSS_e_JS/script.js"></script>
</body>

</html>