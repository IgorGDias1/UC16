<?php 

session_start();

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


    <!-- Linha do cabeçalho -->
    <div class="row fundo-cabecalho">
        <!-- Logotipo -->
        <div class="colv-md-3 mt-2  col-12 "><img src="img/logo.png" width="200px" alt="Logo"
                class="img-fluid mx-auto d-block">
        </div>
        <div>
            <p>
            <h4 class="text-center text-primary-emphasis">MedTime</h2>
                </p>
                <p>
                <h5 class="text-center text-primary">Agendamentos Online</h3>
                    </p>
        </div>

        <div class="row pt-2 justify-content-center align-items-center">
            <div class="col-md-6 col-12">
                <div class="input-group mb-3 d-flex justify-content-center align-items-center">
                    <!-- Barra de pesquisa -->
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar..."
                        aria-describedby="button-addon2">
                    <!-- Botão de busca -->
                    <button type="button" class="btn btn-light">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Usuário -->
        <div class="col-md-3 col-12">
            <!-- login -->
            <?php if(!isset($_SESSION['usuario'])){ ?>
                <div class="d-flex justify-content-center align-items-center">
                <button class="btn me-md-2" type="button">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoLogin" name="botaoLogin">
                        <div class="position-absolute top-0 end-0"><i class="bi bi-person-circle text-dark fs-1"></i>
                        </div>
                </div>
                <?php } ?>

                <?php if(isset($_SESSION['usuario'])){?>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="position-absolute top-0 end-0 dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle text-dark fs-5"> <?php echo'Olá! ' . $_SESSION['usuario']['nome'] ?></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-center" type="button" href="perfil.php">Meu Perfil</a></li>
                                <li><a class="dropdown-item text-center" type="button" href="perfil.php">Resultados</a></li>
                                <li><a class="dropdown-item text-center" type="button" href="agendamentos.htm">Agendamentos</a></li>
                                <li class="mt-3 border border-danger py-1"><a class="bi bi-box-arrow-left fs-6 ms-5 text-danger" href="actions/login/logout.php"> Sair</a></li>
                            </ul>
                        </div>
                    </div>      
               <?php } ?>
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
                                <a class="nav-link active" aria-current="page" href="paginainicial.htm">Página
                                    Inicial</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="consultas.htm">Consultas</a>
                            </li>

                            <li class="nav-item px-3">
                                <a class="nav-link" href="agendamentos.htm">Agendamentos</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link" href="contate_nos.htm">Contate-nós</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>

    <!-- Linha do Carousel -->
    <div class="row mx-4 p-3">
        <div class="col justify-content-center">
            <div id="carouselExampleFade" class="carousel slide carousel-fade ">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/carrosel.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/carrosel2.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>


    <!-- Botões de informação -->
    <div class="row px-5">
        <div class="col-4">
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
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

    <!-- Linha do Rodapé -->
    <div class="row bg-secondary-subtle ">
        <div class="col-md-4 col-12 mt-5">
            <p class="h2">Quem Somos</p><br>
            <p>A Lorem Ipsum Cosmético é uma empresa brasileira fundada em 2011 com o objetivo de atuar como
                perfumaria de acesso e prover o mercado com produtos de qualidade internacional e preço justo.
                Fazemos perfumaria com ciência, amor e arte, assim combinamos notas aromáticas para criar
                acordes
                inesquecíveis que são verdadeiras sinfonias de sentidos</p>
        </div>

        <div class="col-md-4 col-12 mt-5">
            <p class="h2">Categorias</p><br>
            <p>Perfumes Masculinos</p>
            <p>Perfumes Femininos</p>
            <p>Hidratantes</p>
            <p>Desodorantes</p>
            <p>Para sua casa</p>
            <p>Promoções</p>
        </div>

        <div class="col-md-4 col-12 mt-5">
            <p class="h2">Institucional</p><br>
            <p>Quem somos</p>
            <p>Sobre perfumes</p>
            <p>Dicas do Perfumista</p>
            <p>Política de Privacidade</p>
            <p>Entregas</p>
            <p>Pagamentos</p>
            <p>Trocas e Devoluções</p>
        </div>

    </div>

    <!-- Linha dos Recursos -->
    <div class="row bg-secondary-subtle">
        <div class="col">
            <i class="bi bi-shield-check h1"></i>
        </div>
    </div>

    <!-- Linha do Rodapé 2 -->
    <div class="row bg-black">
        <div class="col py-3">
            <span class="text-light ">Copyright MedTime Agendamentos Online-2032. Todos os direitos reservados</span>
        </div>
    </div>
    </div>

    <!-- Modais -->
    <div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center mt-3">
                                        <div class="col-10 conteudo ">
                                            <!-- Forms de login -->
                                            <form id="formLogin" action="actions/login/validar_login.php" method="POST">
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
                                                    <button type="submit" id="btnEntrar"
                                                        class="form-control btn btn-purple rounded text-white submit px-3">Entrar</button>
                                                </div>
                                                <div class="mb-3 mt-3">
                                                    <p class="text-center">Não possui conta?
                                                        <!-- tag <a> que redirecionada para página de cadastro com JS -->
                                                        <a href="#" id="btnCadastroToggle">Cadastre-se</a>
                                                    </p>
                                                </div>
                                            </form>

                                            <!-- Forms de cadastro -->
                                            <form id="formCadastro" action="actions/clientes/cadastrar_cliente.php"
                                                method="POST">
                                                <!-- Div de Nome -->
                                                <div class="mb-3">
                                                    <label for="nomeCadastro" class="form-label">Nome
                                                        Completo:</label>
                                                    <input type="text" class="form-control" id="nomeCadastro"
                                                        name="nome" placeholder="Digite seu nome completo" required>
                                                </div>
                                                <!-- Div de Email Principal -->
                                                <div class="mb-3 py-2">
                                                    <label for="emailCadastro" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="emailCadastro"
                                                        name="email"
                                                        placeholder="Digite o e-mail que você deseja cadastrar"
                                                        required>
                                                </div>
                                                <!-- Div de senha -->
                                                <div class="mb-3 py-3">
                                                    <label for="senhaCadastro" class="form-label">Senha</label>
                                                    <input type="password" class="form-control" id="senhaCadastro"
                                                        name="senha">
                                                    <!-- Checkbocx se clicado ele executára um evento JS que mostra senha -->
                                                    <input type="checkbox" id="senhaCheckBox" onclick="mostrarSenha()">
                                                    Mostrar Senha
                                                </div>
                                                <!-- Div de telefone -->
                                                <div class="mb-3">
                                                    <label for="telefoneCadastro" class="form-label">Telefone para
                                                        contato</label>
                                                    <input type="tel" class="form-control" id="telefoneCadastro"
                                                        name="telefone" maxlength="11"
                                                        placeholder="Exemplo: (DD) 9 9999-9999">
                                                </div>
                                                <!-- Div de CPF -->
                                                <div class="mb-3 py-3">
                                                    <label for="cpfCadastro" class="form-label">CPF</label>
                                                    <input type="text" class="form-control" id="cpfCadastro" name="cpf"
                                                        maxlength="11" placeholder="Exemplo: 000.000.000-00">
                                                </div>
                                                <!-- Div de data de nascimento -->
                                                <div class="mb-3">
                                                    <label for="data_nascimentoCadastro" class="form-label">Data de
                                                        nascimento</label>
                                                    <input type="date" class="form-control" id="data_nascimentoCadastro"
                                                        name="data_nascimento">
                                                </div>
                                                <!-- Botão de cadastro -->
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="form-control btn btn-purple rounded text-white submit px-3"
                                                        id="btnCadastrar">Cadastrar</button>
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
    <script>
        // Alternar entre formulários login x cadastro:
        $("#btnCadastroToggle").click(function () {
            $("#formLogin").hide();
            $("#formCadastro").fadeIn();
            $("#titulo").text('Cadastro - "Nome do Projeto"');
        });
        $("#btnLoginToggle").click(function () {
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

    </script>


</body>

</html>