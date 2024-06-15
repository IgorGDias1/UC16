<div class="row pt-2 corsi">
    <div class="col-12 col-md-3">
        <!-- Logotipo -->
        <img src="img/logo.png" width="100px" alt="Logo" class="img-fluid mx-auto d-block animate__animated animate__jackInTheBox">
            <p class="container-fluid text-center mt-1 righteous-regular ">MedTime </br> Página Inicial</p>
        
    </div>


    <div class="col-12 col-md-5 pt-5">
        <div class="input-group mb-3 d-flex">

            <!-- Barra de pesquisa -->
            <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Buscar..." aria-describedby="button-addon2">
            <!-- Botão de busca -->
            <button type="button" class="btn btn-purple">
                <i class="bi bi-search"></i>
            </button>
        </div>


    </div>
</div>

<!-- Linha do menu NAV-->
<div class="row sticky-top">
    <div class="col-12 p-0">

        <nav class="navbar navbar-expand-lg righteous-regular navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center text-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item px-3">
                            <a class="nav-link <?php if ($paginaAtiva == "1") {
                                                    echo "active";
                                                } ?>" aria-current="page" href="paginainicial.php">Página
                                Inicial</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link <?php if ($paginaAtiva == "2") {
                                                    echo "active";
                                                } ?>" href="consultas.php">Consultas</a>
                        </li>

                        <li class="nav-item px-3">
                            <a class="nav-link <?php if ($paginaAtiva == "3") {
                                                    echo "active";
                                                } ?>" href="agendamentos.php">Agendamentos</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link <?php if ($paginaAtiva == "4") {
                                                    echo "active";
                                                } ?>" href="contate_nos.php">Contate-nós</a>
                        </li>
                    </ul>
                </div>

                 <!-- USUARIO E LOGIN -->
               <?php if (!isset($_SESSION['usuario'])) { ?>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn" type="button">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoLogin" name="botaoLogin">
                            <div class="position-absolute top-0 end-0"><i class="bi bi-person-circle text-light fs-1"></i></div>
                    </div>
                <?php } ?>

                <?php if (isset($_SESSION['usuario'])) { ?>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="position-absolute top-0 end-0 dropdown">
                            <button class="btn btn-light dropdown-toggle mt-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle text-dark fs-5"> <?php echo 'Olá! ' . $_SESSION['usuario']['nome'] ?></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-center" type="button" href="perfil.php">Meu Perfil</a></li>
                                <li><a class="dropdown-item text-center" t.ype="button" href="perfil.php">Resultados</a></li>
                                <li><a class="dropdown-item text-center" type="button" href="agendamentos.htm">Meus agendamentos</a></li>
                                <li class="mt-3 border border-danger py-1"><a class="bi bi-box-arrow-left fs-6 ms-5 text-danger" href="actions/login/logout.php"> Sair</a></li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
               
            </div>
        </nav>
    </div>
</div>



<!-- Modais -->
<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <form id="formCadastro" action="actions/clientes/cadastrar_cliente.php" method="POST" style="display: none;">
                            <!-- Div de Nome -->
                            <div class="mb-3">
                                <label for="nomeCadastro" class="form-label">Nome
                                    Completo:</label>
                                <input type="text" class="form-control" id="nomeCadastro" name="nome" placeholder="Digite seu nome completo" required>
                            </div>
                            <!-- Div de Email Principal -->
                            <div class="mb-3 py-2">
                                <label for="emailCadastro" class="form-label">Email</label>
                                <input type="text" class="form-control" id="emailCadastro" name="email" placeholder="Digite o e-mail que você deseja cadastrar" required>
                            </div>
                            <!-- Div de senha -->
                            <div class="mb-3 py-3">
                                <label for="senhaCadastro" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senhaCadastro" name="senha">
                                <!-- Checkbocx se clicado ele executára um evento JS que mostra senha -->
                                <input type="checkbox" id="senhaCheckBox" onclick="mostrarSenha()">
                                Mostrar Senha
                            </div>
                            <!-- Div de telefone -->
                            <div class="mb-3">
                                <label for="telefoneCadastro" class="form-label">Telefone para
                                    contato</label>
                                <input type="tel" class="form-control" id="telefoneCadastro" name="telefone" maxlength="11" placeholder="Exemplo: (DD) 9 9999-9999">
                            </div>
                            <!-- Div de CPF -->
                            <div class="mb-3 py-3">
                                <label for="cpfCadastro" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="cpfCadastro" name="cpf" maxlength="11" placeholder="Exemplo: 000.000.000-00">
                            </div>
                            <!-- Div de data de nascimento -->
                            <div class="mb-3">
                                <label for="data_nascimentoCadastro" class="form-label">Data de
                                    nascimento</label>
                                <input type="date" class="form-control" id="data_nascimentoCadastro" name="data_nascimento">
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
        </div>
    </div>
</div>