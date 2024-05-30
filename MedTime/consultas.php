<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/png" href="img/favico.png">
    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="CSS_e_JS/style.css">
    <!-- api google fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Amatic+SC:wght@400;700&family=Bungee&family=Bungee+Spice&family=Press+
    Start+2P&family=Righteous&family=Rubik+Doodle+Shadow&family=Uchen&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid align-items-center text-center justify-content-center">
        <div class="row pt-2 corsi">
            <div class="col-1 col-3">

                <!-- Logotipo -->
                <div class="colv-md-3 col-12"><img src="img/logo.png" width="100px" alt="Logo"
                        class="img-fluid mx-auto d-block">
                    <p class="container-fluid text-center mt-1 righteous-regular">MedTime - Consultas</p>
                </div>



            </div>

            <div class="col-5 pt-5">
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
        </div>
    </div>

    <!-- Linha do menu NAV-->
    <div class="row sticky-top">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-custom righteous-regular">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center text-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item px-3">
                                <a class="nav-link" aria-current="page" href="paginainicial.php">Página
                                    Inicial</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link active" href="consultas.php">Consultas</a>
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
                        <?php if(!isset($_SESSION['usuario'])){ ?>
                            <div class="d-flex justify-content-center align-items-center">
                            <button class="btn me-md-2" type="button">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="botaoLogin" name="botaoLogin">
                                    <div class="position-absolute top-0 end-0"><i class="bi bi-person-circle text-light fs-1 me-4"></i>
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
                                    
           </div>
        </div>
    </div>

    </nav>

    </div>
    </div>

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem incidunt hic deleniti accusamus voluptatum natus
        nobis dolores id possimus corrupti perspiciatis laboriosam quibusdam labore perferendis consequuntur nihil
        provident, non sunt.</p>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="CSS_e_JS/script.js"></script>
</body>

</html>