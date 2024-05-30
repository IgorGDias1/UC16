<?php 
session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: actions/login/index.php');
    die();
}

require_once('classes/Usuario.class.php');
$usuario = new Usuario();
$usuario->id=$_SESSION['usuario']['id'];
$info = $usuario->ListarPorId();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedTime</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" type="image/png" href="img/favico.png">

    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="css/style.css">


    <!-- api google fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Amatic+SC:wght@400;700&family=Bungee&family=Bungee+Spice&family=Press+
        Start+2P&family=Righteous&family=Rubik+Doodle+Shadow&family=Uchen&display=swap" rel="stylesheet">
    <style>
        #formCadastro {
            display: none;
        }
    </style>
</head>

<body>

    <div class="row pt-2 corsi">
        <div class="col-1 col-3">

            <!-- Logotipo -->
            <div class="colv-md-3 col-12"><img src="img/logo.png" width="100px" alt="Logo"
                    class="img-fluid mx-auto d-block">
                    <p class="container-fluid text-center mt-1 righteous-regular">MedTime - Perfil</p>
            </div>

            
            
        </div>

        <div class="col-5 col- pt-5">
            <div class="input-group mb-3 d-flex">

                <!-- Barra de pesquisa -->
                <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Buscar..."
                    aria-describedby="button-addon2">
                <!-- Botão de busca -->
                <button type="button" class="btn btn-purple">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>


    <!-- Usuário -->
    <div class="col-8 col-12">
        <!-- login -->
        <div class="d-flex">
            <button class="btn me-md-2" type="button">

                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class=""><i class="bi bi-person-circle text-light fs-1"></i>
                    </div>
        </div>
    </div>
</div>

 <!-- Linha do menu -->
 <div class="row">
    <div class="col">
        <nav class="navbar navbar-expand-lg navbar-custom righteous-regular ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item px-3">
                            <a class="nav-link" aria-current="page" href="paginainicial.php">Página
                                Inicial</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="consultas.htm">Consultas</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link" href="agendamentos.htm">Agendamentos</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="contate_nos.htm">Contate-nos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


        <div class="container-fluid">
            <div class="row mt-3 ms-4 me-3">
                <div class="col-md-4">
                    <img src="img/profile.png" class="rounded-circle border border-5 img-fluid mx-auto d-block" alt="...">
                    <div class="d-grid gap-2 me-3">
                        <div class="btn-group-vertical mt-3" role="group" aria-label="Vertical button group">
                            <button type="button" class="btn btn-primary ">Meus agendamentos</button>
                        </div>
                        <div class="btn-group-vertical " role="group" aria-label="Vertical button group">
                            <button type="button" class="btn btn-primary ">Meus resultados</button>
                        </div>
                        <div class="btn-group-vertical mb-3" role="group" aria-label="Vertical button group">
                            <button type="button" class="btn btn-primary ">Meus exames</button>
                        </div>
                      </div>
                   

                </div>
                <div class="col-md-8 rounded-3 border border-3 mb-2" hidden>
                    <p class="h2 text-center">Meus Agendamentos</p>
                    <input class="form-control form-control-lg mb-2 w-75" name="nomeagendamento" id="nomeagendamento" type="text" placeholder="Nome do exame"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="convenio" id="convenio" type="text" placeholder="Convênio"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="dataagendamento" id="dataagendamento" type="text" placeholder="Data"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="localagendamento" id="localagendamento" type="text" placeholder="Local"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="situacaoagendamento" id="situacaoagendamento" type="text" placeholder="Situação"
                        aria-label=".form-control-lg example">
                </div>

                <div class="col-md-8 rounded-3 border border-3 mb-2" hidden>
                    <p class="h2 text-center">Meus Exames</p>
                    <input class="form-control form-control-lg mb-2 w-75" name="nomeexame" id="nomexame" type="text" placeholder="Nome do exame"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="dataexame" id="dataexame" type="text" placeholder="data da realização"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="medicoexame" id="medicoexame" type="text" placeholder="Médico responsável"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="resultadoexame" id="resultadoexame" type="text" placeholder="Resultado"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="situacaoexame" id="situacaoexame" type="text" placeholder="Situação"
                        aria-label=".form-control-lg example">
                </div>

                <div class="col-md-8 rounded-3 border border-3 mb-2" hidden>
                    <p class="h2 text-center">Meus Resultados</p>
                    <input class="form-control form-control-lg mb-2 w-75" name="nomeresultado" id="nomeresultado" type="text" placeholder="Nome do exame"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="dataresultado" id="dataresultado" nametype="text" placeholder="Data da realização"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="localizacaoresultado" id="localizacaoresultado" type="text" placeholder="Localização realizada"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="resultado" id="resultado" type="text" placeholder="Resultado"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" name="reagendamento" id="reagendamento" type="text" placeholder="Reagendamento"
                        aria-label=".form-control-lg example">
                </div>

                <div class="col-md-8 rounded-3 border border-3 mb-2">
                    <p class="h2 text-center">Dados pessoais</p>
                    <?php foreach($info as $i){?>
                    <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Nome Completo"
                        aria-label=".form-control-lg example" value="<?=$i['nome'];?>">
                    <input class="form-control form-control-lg mb-2 w-75" type="email" placeholder="Email"
                        aria-label=".form-control-lg example" value="<?=$i['email'];?>">
                    <input class="form-control form-control-lg mb-2 w-75" type="date" placeholder="data de nascimento"
                        aria-label=".form-control-lg example" value="<?=$i['data_nascimento'];?>">
                    <input class="form-control form-control-lg mb-2 w-75" type="tel" placeholder="Telefone Celular"
                        aria-label=".form-control-lg example" value="<?=$i['telefone_celular'];?>">
                    <input class="form-control form-control-lg mb-2 w-75" type="tel" placeholder="Telefone Residencial"
                        aria-label=".form-control-lg example" value="<?=$i['telefone_residencial'];?>">    
                    <?php } ?>

                        <br><hr><br>
                    <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Estado"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Bairro"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Rua"
                        aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-2 w-25" type="text" placeholder="N°"
                        aria-label=".form-control-lg example">
                </div>
            </div>
        </div>
    </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>