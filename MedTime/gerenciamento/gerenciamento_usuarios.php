<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootsstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>
<body>

<!-- Container principal -->
<div class="container-fluid mt-5">
    <!-- Navbar geral -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

    <div class="mx-5"><a class="navbar-brand" href="#">Medtime</a></div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span> 


    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Página Inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Consultar Agendamento</a>
        </li>

        <!-- Dropdown de Cadastro -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Gerenciamento
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Usuários</a></li>
            <li><a class="dropdown-item" href="#">Funcionários</a></li>
            <li><a class="dropdown-item" href="#">Exames</a></li>
          </ul>
        </li>

        <!-- Dropdown de Exames -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Exames
          </a>
          <!-- Preencher usando PHP trazendo uma view com os exames -->
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Suporte</a>
        </li>

    </div>
        <div class="d-flex justify-content-end mx-5">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalLogin"><i class="bi bi-person-square fs-2 text-danger"></i></a>
        </div>
  </div>
</nav>

<!-- Container de gerenciamento -->
<div class="container-fluid mt-5">
    <h2 class="text-center mb-4">Gerenciamento de Usuários</h2>
    <div class="row mb-3"></div>
</div>
</div>

<!-- Modais -->

<!-- Modal de Login -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- Ttitulo do modal -->
        <h1 class="modal-title fs-5" id="modalLoginLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Inputs -->
      <div class="form-floating mb-3">
        <!-- Email -->
        <input type="email" class="form-control" id="email" placeholder="name@example.com">
        <label for="email">Endereço de e-mail</label>
    </div>
        <div class="form-floating">
            <!-- Senha -->
            <input type="password" class="form-control" id="senha" placeholder="Password">
            <label class="mb-5"for="senha">Senha</label>
            <!-- Checkbox para mostrar senha -->
            <input class="form-check-input" type="checkbox" id="senhaCheckBox" onclick="mostrarSenha()"> Mostrar Senha
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
        <button type="button" class="btn btn-success">Entrar</button>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        //Função para mostrar e ocultar a senha no campo de cadastro
        function mostrarSenha() {
        var x = document.getElementById("senha");
        if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    
</body>
</html>