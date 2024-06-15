<!-- Container principal -->
<div class="container-fluid mt-5 justify-content-center">

    <!-- LOGO -->
    <div class="row pt-2 corsi">
        <div class="col-12 col-md-2">
            <!-- Logotipo -->
            <img src="../../img/logo.png" alt="logo" width="200px" class="img-fluid mx-auto d-block animate__animated animate__jackInTheBox">
        </div>
        <!-- Navbar geral -->
        <div class="col-12 col-md-8">
            <nav class="navbar navbar-expand-lg navbar-custom righteous-regular">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center py-2 flex-wrap" id="navbarNav">
                        
                        <ul class="navbar-nav">
                            <li class="nav-item px-3 mt-4">
                                <a class="nav-link active" aria-current="page" href="../clientes/gerenciamento_clientes.php">Página Inicial</a>
                            </li>

                            <li class="nav-item px-3 mt-4"> 
                                <a class="nav-link active" href="../agendamentos/gerenciamento_agendamentos.php">Agendamentos</a>
                             </li>


                            <!-- DROPDOWN GERENCIAMENTOS -->
                            <li class="nav-item dropdown px-3 mt-4">
                                <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gerenciamentos
                                </button>
                                <ul class="dropdown-menu dropdown-menu px-2">
                                    <li><a class="dropdown-item" href="../enderecos/gerenciamento_enderecos.php">Endereços</a></li>
                                    <li><a class="dropdown-item" href="#">Resultados</a></li>
                                    <li><a class="dropdown-item" href="../outro/gerenciamento_outro.php">Outros</a></li>
                                </ul>
                            </li>

                            <!-- DROPDOWN DO ATENDIMENTO -->
                            <li class="nav-item dropdown px-3 mt-4">
                                <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ajuda
                                </button>
                                <ul class="dropdown-menu dropdown-menu px-2">
                                    <li> <a class="nav-link" href="../atendimento/atendimento.php">Atendimento</a> </li>
                                    <li> <a class="nav-link" href="#">Suporte</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- BOTAO DE LOGOUT -->
        <div class="col-12 col-md-2">
            <div class="d-flex justify-content-end mx-5">
                <a class="btn btn-danger mx-1 text-white" href="logout.php">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
        </div>

    </div>
</div>