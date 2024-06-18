<?php

session_start();

if(!isset($_SESSION['usuario'])) {
    header('Location: actions/login/index.php');
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
       $paginaAtiva = "4";
       include_once("includes/elementos.include.php");
       ?>

        <!-- Linha da imagem e da linha para contatos -->
        <div class="row">
            <div class="col-md-6 mt-3 p-4 ">
                <p class="h2">Área de feedback:</p>
                <p class="text-md-start"> Bem-vindo à nossa central de suporte!<br>

                     <br>

                    Estamos aqui para garantir que sua experiência com nosso site de agendamento de consultas seja sempre a melhor possível. Se você tiver alguma dúvida, problema técnico ou sugestão para melhorar nossos serviços, não hesite em entrar em contato conosco. Nossa equipe dedicada está pronta para ajudar e garantir que suas consultas sejam agendadas de forma eficiente e conveniente.<br><br>

                    Agradecemos por escolher nossos serviços de agendamento. Estamos comprometidos em proporcionar uma experiência tranquila e eficiente para todos os nossos usuários.
                    
                </p>
            </div>
            <!-- Linha do envio de feedback -->
            <div class="col-md-6 rounded-3  mb-2 p-4">
                <form action="actions/suporte/cadastrar_suporte.php" method="POST">
                    <div class="mb-3 form-floating">
                        <input type="hidden" value="<?=$_SESSION['usuario']['id'];?>" id="id_cliente" name="id_cliente">
                        <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="<?=$_SESSION['usuario']['nome'];?>">
                        <label for="exampleFormControlInput1 floatingInput" class="form-label">Nome completo</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" class="form-control" id="exampleFormControlInput1" 
                            value="<?=$_SESSION['usuario']['email'];?>">
                        <label for="exampleFormControlInput1 floatingInput" class="form-label">Email</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select name="assunto" id="assunto" class="form-control">
                            <option value="Experiencia Geral">Experiência Geral</option>
                            <option value="Agendamento">Agendamento</option>
                            <option value="Atendimento">Atendimento</option>
                            <option value="Profissionais">Profissionais</option>
                            <option value="Consulta">Consulta</option>
                            <option value="Sugestao">Sugestão</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <label for="assunto" class="form-floating">Assunto</label>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="feedback" name="feedback" rows="3" placeholder="Por favor deixe seu feedback abaixo"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar feedback</button>
                </form>
            </div>
        </div>

        <?php
            include_once("includes/rodape.include.php");
            ?>
            
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- puxar js -->
    <script src="CSS_e_JS/script.js"></script>

    <?php include_once('includes/alertas.include.php'); ?>


</body>