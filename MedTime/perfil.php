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

<?php 
       $paginaAtiva = "2";
       include_once("includes/elementos.include.php");
       ?>

        <div class="container-fluid">
            <div class="row mt-3 ms-4 me-3">
                <div class="col-md-4">
                    <img src="img/profile.png" class="rounded-circle border border-black img-fluid mx-auto d-block" alt="...">
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

                <div class="col-md-8 rounded-3 border border-black mb-3">
                    <p class="h2 text-center mt-3 mb-3">Dados pessoais</p>
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





    <!-- puxar js -->
    <script src="CSS_e_JS/script.js"></script>


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