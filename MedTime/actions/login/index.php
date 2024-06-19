<!doctype html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/png" href="../../img/favico.png">
    
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
                        <input class="mt-3" type="checkbox" class="form-check-input" onclick="mostrarSenha()"> Mostrar Senha
                    </div>
                    <!-- Botão de login -->
                    <div class="form-group">
                        <button type="submit" id="btnEntrar" class="form-control btn btn-purple rounded text-white submit px-3">Entrar</button>
                    </div>
                    <div class="mb-3 mt-3">
                        <p class="text-center">Não possui conta?
                            <!-- tag <a> que redirecionada para página de cadastro com JS -->
                            <a href="#" id="btnCadastroToggle">Cadastre-se</a>
                        </p>
                    </div>
                </form>
                <!-- Forms de cadastro -->
                <form id="formCadastro" action="cadastrar_cliente.php" method="POST" style="display: none;">
                    <!-- Div de Nome -->
                    <div class="mb-3">
                        <label for="nomeCadastro" class="form-label">Nome
                            Completo:</label>
                        <input type="text" class="form-control" id="nomeCadastro" name="nomeCadastro" placeholder="Digite seu nome completo" required>
                    </div>
                    <!-- Div de Email Principal -->
                    <div class="mb-3 py-2">
                        <label for="emailCadastro" class="form-label">Email</label>
                        <input type="text" class="form-control" id="emailCadastro" name="emailCadastro" placeholder="Digite o e-mail que você deseja cadastrar" required>
                    </div>
                    <!-- Div de senha -->
                    <div class="mb-3 py-3">
                        <label for="senhaCadastro" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senhaCadastro" name="senhaCadastro">
                        <!-- Checkbocx se clicado ele executára um evento JS que mostra senha -->
                        <input type="checkbox" id="senhaCheckBox" onclick="mostrarSenha()">
                        Mostrar Senha
                    </div>
                    <!-- Div de telefone -->
                    <div class="mb-3">
                        <label for="telefoneCadastro" class="form-label">Telefone para
                            contato</label>
                        <input type="tel" class="form-control" id="telefoneCadastro" name="telefoneCadastro" maxlength="11" placeholder="Exemplo: (DD) 9 9999-9999">
                    </div>
                    <!-- Div de CPF -->
                    <div class="mb-3 py-3">
                        <label for="cpfCadastro" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpfCadastro" name="cpfCadastro" maxlength="11" placeholder="Exemplo: 000.000.000-00">
                    </div>
                    <!-- Div de data de nascimento -->
                    <div class="mb-3">
                        <label for="data_nascimentoCadastro" class="form-label">Data de
                            nascimento</label>
                        <input type="date" class="form-control" id="data_nascimentoCadastro" name="data_nascimentoCadastro">
                    </div>
                    <!-- Botão de cadastro -->
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-purple rounded text-white submit px-3" id="btnCadastrar">Cadastrar</button>
                    </div>
                    <div class="mb-3 mt-3">
                        <p class="text-center">Já possui conta?
                            <!-- Caso clicado irá redirecionar para a página de login -->
                            <a href="#" id="btnLoginToggle">Entrar</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Javascript externo -->
    <script src="script.js"></script>

    <script>
        // Alternar entre formulários login x cadastro:
            $("#btnCadastroToggle").click(function () {
            $("#formLogin").hide();
            $("#formCadastro").fadeIn();
            $("#titulo").text('Cadastro');
        });
        $("#btnLoginToggle").click(function () {
            $("#formCadastro").hide();
            $("#formLogin").fadeIn();
            $("#titulo").text('Login');
        });
    </script>
    <?php include_once('../../includes/alertas.include.php'); ?>



</body>

</html>