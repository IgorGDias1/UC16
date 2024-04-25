
<!doctype html>
<html lang="pt-br">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #F4D03F;
            background-image: linear-gradient(132deg, #3374FF 0%, #33F3FF 100%);
            background-attachment: fixed;
            background-size: cover;
        }

        .conteudo {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
        }

        #formCadastro {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-4">
                <!-- Título da página de login -->
                <h1 class="text-white" id="titulo">Login - "Nome do Projeto"</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-4 conteudo">
                <!-- Forms de login -->
                <form id="formLogin" action="#" method="POST">
                    <!-- Div de email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <!-- Div de senha -->
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <!-- Botão de login -->
                    <div class="form-group">
                        <button type="submit" id="btnEntrar" class="form-control btn btn-primary rounded submit px-3">Entrar</button>
                    </div>
                    <div class="mb-3 mt-3">
                        <p class="text-center">Não possui conta? 
                            <!-- tag <a> que redirecionada para página de cadastro com JS -->
                            <a href="#" id="btnCadastroToggle">Cadastre-se</a></p>
                    </div>
                </form>

                <!-- Forms de cadastro -->
                <form id="formCadastro" action="#" method="POST">
                    <!-- Div de Nome -->
                    <div class="mb-3">
                        <label for="nomeCadastro" class="form-label">Nome Completo:</label>
                        <input type="text" class="form-control" id="nomeCadastro" name="nome" placeholder="Digite seu nome completo" required>
                    </div>
                    <!-- Div de Email Principal -->
                    <div class="mb-3 py-2">
                        <label for="emailCadastro" class="form-label">Email</label>
                        <input type="text" class="form-control" id="emailCadastro" name="email" placeholder="Digite o e-mail que você deseja cadastrar" required>
                    </div>
                    <!-- Input de radio, caso de click irá executar um evento JS para mostrar os campos -->
                        <input type="radio" id="simEmail" onclick="simOuNaoCheck()"> Desejo adicionar outro e-mail
                            <!-- style: define a visibilidade dos campos, por padrão é ocultado(none) -->
                            <!-- Div de email secundário -->
                            <div class="mb-3 mt-2" id="simChecked" style="display:none"> 
                                <label for="emailSecundario" class="form-label" >Email secundário<i> (Opcional)</i></label>
                                <input type="text" class="form-control" id="emailSecundario" name="email" placeholder="Digite o e-mail que você deseja cadastrar">
                            </div>
                    <!-- Div de senha -->
                    <div class="mb-3 py-3">
                        <label for="senhaCadastro" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senhaCadastro" name="senha">
                        <!-- Checkbocx se clicado ele executára um evento JS que mostra senha -->
                        <input type="checkbox" id="senhaCheckBox" onclick="mostrarSenha()"> Mostrar Senha
                    </div>
                    <!-- Div de telefone -->
                    <div class="mb-3">
                        <label for="telefoneCadastro" class="form-label">Telefone para contato</label>
                        <input type="tel" class="form-control" id="telefoneCadastro" name="telefone" maxlength="11" placeholder="Exemplo: (DD) 9 9999-9999">
                    </div>
                    <!-- Idem ao de email secundário -->
                    <input type="radio" id="simTel" onclick="simOuNaoCheck()"> Desejo adicionar outro telefone
                    <!-- Div de telefone secundário -->
                    <div class="mb-3 mt-2" id="simTelChecked" style="display:none">
                        <label for="telSecundario" class="form-label" >Telefone reserva<i> (Opcional)</i></label>
                        <input type="tel" class="form-control" id="telSecundario" name="telefone" placeholder="Exemplo: (DD) 9 9999-9999">
                    </div>
                    <!-- Div de CPF -->
                    <div class="mb-3 py-3">
                        <label for="cpfCadastro" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpfCadastro" name="cpf" maxlength="11" placeholder="Exemplo: 000.000.000-00">
                    </div>
                    <!-- Div de data de nascimento -->
                    <div class="mb-3">
                        <label for="data_nascimentoCadastro" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" id="data_nascimentoCadastro" name="data_nascimento">
                    </div>
                    <!-- Botão de cadastro -->
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3" id="btnCadastrar">Cadastrar</button>
                    </div>
                    <div class="mb-3 mt-3">
                        <p class="text-center">Já possui conta? 
                            <!-- Caso clicado irá redirecionar para a página de login -->
                            <a href="#" id="btnLoginToggle">Entrar</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Alternar entre formulários login x cadastro:
        $("#btnCadastroToggle").click(function() {
            $("#formLogin").hide();
            $("#formCadastro").fadeIn();
            $("#titulo").text('Cadastro - "Nome do Projeto"');
        });
        $("#btnLoginToggle").click(function() {
            $("#formCadastro").hide();
            $("#formLogin").fadeIn();
            $("#titulo").text('Login - "Nome do Projeto"');
        });

        //Função para mostrar e ocultar a senha no campo de cadastro
        function mostrarSenha() {
        var x = document.getElementById("senhaCadastro");
        if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
            }
        }

        //Função para verificar se foi clicado a opção de email/telefone secundário
        function simOuNaoCheck() {
        if (document.getElementById('simEmail').checked) { //Caso email tenha sido clicado
            document.getElementById('simChecked').style.display = 'block'; //Block = visível
        } else {
            document.getElementById('simChecked').style.display = 'none'; //None = invisível
        }

        if (document.getElementById('simTel').checked){  //Caso telefone tenha sido clicado
            document.getElementById('simTelChecked').style.display = 'block';
        } else {
            document.getElementById('simTelChecked').style.display = 'none';
        }
}
        
    </script>

</body>

</html>