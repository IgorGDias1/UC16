<!doctype html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/png" href="../img/favico.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <!-- Título da página de login -->
                <img src="../../img/logo.png" width="200px" alt="Logo" class="img-fluid mx-auto d-block">
                <h1 class="text-white text-center mt-5" id="titulo">Login</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-4 conteudo">
                <!-- Forms de login -->
                <form class="" id="formLogin" action="validar_login.php" method="POST">
                    <!-- Div de email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="invalid-feedback">E-mail incorreto</div>
                    </div>
                    <!-- Div de senha -->
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                        <input class="mt-3" type="checkbox" class="form-check-input" onclick="mostrarSenha()">  Mostrar Senha
                    </div>
                    <!-- Botão de login -->
                    <div class="form-group">
                        <button type="submit" id="btnEntrar" class="form-control btn btn-purple rounded text-white submit px-3">Entrar</button>
                    </div>
                    <div class="mb-3 mt-3">
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Javascript externo -->
     <script src="script.js"></script>

    <?php include_once('../../includes/alertas.include.php'); ?>



</body>

</html>