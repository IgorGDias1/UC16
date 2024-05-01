<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootsstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="shortcut icon" type="image/png" href="../img/favico.png">

  <style>
    body {
      background: #f8f9fa;
    }
  </style>
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
          <a class="btn btn-danger mx-1 text-white" href="sair.php"><i class="bi bi-box-arrow-right"></i> Sair</a>
        </div>
      </div>
    </nav>

    <!-- Container de gerenciamento -->
    <div class="container mt-5">
      <h1 class="text-center mb-4">Gerenciamento de Usuários</h1>
      <div class="row mb-3">
        <div class="col d-flex justify-content-end">
          <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#modalCadastro"><i class="bi bi-plus-circle"></i> Cadastrar Usuário</button>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Convenio</th>
            <th>Especialidade</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </div>
  </div>

  <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="actions/cadastrar_produto.php" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCadastroLabel">Cadastrar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span> 
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="nomeProduto">Nome</label>
              <input type="text" class="form-control" id="nomeUsuario" placeholder="Digite o nome do produto" name="nome">
            </div>
            <div class="form-group">
              <label for="fotoProduto">Email</label>
              <input type="email" class="form-control" id="emailUsuario" name="email">
            </div>
            <div class="form-group">
              <label for="descricaoProduto">Cpf</label>
              <input type="text" class="form-control" id="cpfUsuario" rows="3" name="cpf"></input>
            </div>
            <div class="form-group">
              <label for="categoriaProduto">Data de Nascimento</label>
              <input class="form-control" id="datanasciUsuario" name="data_nascimento"></input>
            </div>
            <div class="form-group">
              <label for="estoqueProduto">Categoria</label>
              <input type="number" class="form-control" id="estoqueProduto" placeholder="Digite a quantidade em estoque" name="estoque">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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