<div class="row pt-2 corsi">
    <div class="col-3">
        <!-- Logotipo -->
        <div class="colv-md-3 col-12"><img src="img/logo.png" width="100px" alt="Logo" class="img-fluid mx-auto d-block animate__animated animate__jackInTheBox">
            <p class="container-fluid text-center mt-1 righteous-regular ">MedTime </br> Página Inicial</p>
        </div>
    </div>


    <div class="col-5 pt-5">
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
                                    <a class="nav-link <?php $paginaAtiva == "1" ?? echo "active";  ?>" aria-current="page" href="paginainicial.php">Página
                                        Inicial</a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link" href="consultas.php">Consultas</a>
                                </li>

                                <li class="nav-item px-3">
                                    <a class="nav-link" href="agendamentos.php">Agendamentos</a>
                                </li>
                                <li class="nav-item px-3">
                                    <a class="nav-link" href="contate_nos.php">Contate-nós</a>
                                </li>
                            </ul>
                        </div>

                        <!-- USUARIO E LOGIN -->
                        <?php if (!isset($_SESSION['usuario'])) { ?>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn" type="button">
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoLogin" name="botaoLogin">
                                        <div class="position-absolute top-0 end-0"><i class="bi bi-person-circle text-light fs-1 me-4"></i>
                                        </div>
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
                                        <li><a class="dropdown-item text-center" type="button" href="agendamentos.htm">Agendamentos</a></li>
                                        <li class="mt-3 border border-danger py-1"><a class="bi bi-box-arrow-left fs-6 ms-5 text-danger" href="actions/login/logout.php"> Sair</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>