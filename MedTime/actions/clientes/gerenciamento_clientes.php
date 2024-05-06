<?php

session_start();

if (!isset($_SESSION['usuario'])) {
  //Retornar a tela de login
  header('Location: ../login/index.php');
  die();
}

require_once('../../classes/Cliente.class.php');
$cliente = new Cliente();
$lista_clientes = $cliente->Listar();

require_once('../../classes/Localizacao.class.php');
$localizacao = new Localizacao();
$lista_localizacao = $localizacao->Listar();

require_once('../../classes/Convenio.class.php');
$convenio = new Convenio();
$lista_convenios = $convenio->Listar();



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento de Clientes</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootsstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="shortcut icon" type="image/png" href="../img/favico.png">

  <!-- Removendo a setinha do imput number -->
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>


</head>

<body>

  <!-- Container principal -->
  <div class="container-fluid mt-5">
    <!-- Navbar geral -->
    <nav class="navbar navbar-expand-lg navbar-custom righteous-regular">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center py-2" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item px-3 mx-3">
              <a class="nav-link active" href="#">
                <img src="../../img/logo.png" alt="logo" width="100px">
              </a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link active" aria-current="page" href="#">Página Inicial</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Consultas</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Exames disponíveis</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Agendamentos</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Contate-nós</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="d-flex justify-content-end mx-5">
        <a class="btn btn-danger mx-1 text-white" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
        </a>
      </div>
    </nav>

  </div>

  <!-- Container de gerenciamento -->
  <div class="container mt-5">
    <h2 class="text-center mb-4">Gerenciamento de Clientes</h2>
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#modalCadastro"><i class="bi bi-plus-circle"></i> Cadastrar Usuário</button>
      </div>
    </div>
    <table class="table table-striped table-hover table-primary ">
      <thead>
        <tr>
          <th hidden>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th hidden>Senha</th>
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Telefone Celular</th>
          <th>Telefone Residencial</th>
          <th>CEP</th>
          <th>Convênio</th>
          <th>Tipo</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista_clientes as $cliente) { ?>
          <tr>
            <td hidden class="table-primary"><?= $cliente['id']; ?></td>
            <td><?= $cliente['nome']; ?></td>
            <td><?= $cliente['email']; ?></td>
            <td hidden><?= $cliente['senha']; ?></td>
            <td><?= $cliente['cpf']; ?></td>
            <td><?= $cliente['data_nascimento']; ?></td>
            <td><?= $cliente['telefone_celular']; ?></td>
            <td><?= $cliente['telefone_residencial']; ?></td>
            <td><?= $cliente['id_localizacao']; ?></td>
            <td><?= $cliente['id_convenio']; ?></td>
            <td><?= $cliente['tipo'];?></td>
            <td>
            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"            data-target="#modalEdicao" 
            data-id="<?= $cliente['id']; ?>" 
            data-nome="<?= $cliente['nome']; ?>" 
            data-email="<?= $cliente['email']; ?>" 
            data-cpf="<?= $cliente['cpf']; ?>" 
            data-data_nascimento="<?= $cliente['data_nascimento']; ?>" 
            data-telefone_celular="<?= $cliente['telefone_celular']; ?>" 
            data-telefone_residencial="<?= $cliente['telefone_residencial']; ?>" 
            data-id_localizacao="<?= $cliente['id_localizacao']; ?>" 
            data-id_convenio="<?= $cliente['id_convenio']; ?>">
            <i class="bi bi-pencil-square"></i> Editar</button>
          </td>
            <td>
              <a href="#" class="btn btn-danger btn-sm" onclick="excluir(<?= $cliente['id']; ?>)">
              <i class="bi bi-file-earmark-x"></i> Excluir
            </a>
          </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  </div>

  <!-- Modal de cadastro -->
  <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="cadastrar_cliente.php" method="POST">
          <div class="modal-header d-flex justify-content-center">
            <h5 class="modal-title" id="modalCadastroLabel">Cadastrar novo cliente</h5>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group mt-3">
              <label for="nomeProduto">Nome</label>
              <input type="text" class="form-control" id="nomeUsuario" placeholder="Digite o nome do cliente" name="nome" required>
            </div>
            <div class="form-group mt-3">
              <label for="fotoProduto">Email</label>
              <input type="email" class="form-control" id="emailUsuario" name="email" placeholder="email@email.com" required>
            </div>
            <div class="form-group mt-3">
              <label for="fotoProduto">Senha</label>
              <input type="password" class="form-control" id="senha" name="senha" required>
              <input class="mt-3" type="checkbox" class="form-check-input" onclick="mostrarSenha()"> Mostrar Senha
            </div>
            <div class="form-group mt-3">
              <label for="descricaoProduto">CPF</label>
              <input type="text" maxlength="11" class="form-control" id="cpfUsuario" name="cpf"></input required>
            </div>
            <div class="form-group mt-3">
              <label for="data_nasciUsuario">Data de Nascimento</label>
              <input type="date" class="form-control" id="datanasciUsuario" name="data_nascimento"></input>
            </div required>
            <div class="form-group mt-3">
              <label for="telcelUsuario">Telefone Celular</label>
              <input type="tel" class="form-control" id="telcelUsuario" maxlenght="14" placeholder="(DDD) 9 9999-9999" name="telefone_celular">
            </div>
            <div class="form-group mt-3">
              <label for="telresUsuario">Telefone Residencial</label>
              <input type="tel" class="form-control" id="telresUsuario" maxlenght="14" placeholder="(DDD) 9 9999-9999" name="telefone_residencial">
            </div>
            <br>
            <hr>
            <div class="form-group mt-2">
              <label>CEP
              <input name="cep" class="form-control" type="text" id="cep" size="10" maxlength="9"
              onblur="pesquisacep(this.value);" required/></label>
              <label hidden id="ruaLabel">Rua
              <input name="rua" class="form-control" type="text" id="rua" size="60" hidden/></label>
              <label hidden id="complementoLabel">Complemento
              <input name="complemento" class="form-control" type="text" id="complemento" size="60" /></label>
              <label hidden id="bairroLabel">Bairro
              <input name="bairro" class="form-control" type="text" id="bairro" size="40" hidden/></label>
              <label hidden id="cidadeLabel">Cidade
              <input name="cidade" class="form-control" type="text" id="cidade" size="40" hidden/></label><br>
              <label hidden id="ufLabel">Estado
              <input name="uf" class="form-control" type="text" id="uf" size="2" hidden/></label>
              <label hidden id="dddLabel">DDD
              <input name="ddd" class="form-control" type="text" id="ddd" size="8" hidden/></label>
              <label hidden id="tipoLabel">Tipo
              <select name="tipoLocal" id="tipo" class="form-control"  hidden>
                <option value="residencial">Residencial</option>
                <option value="comercial">Comercial</option>
                <option value="clinica">Clinica</option>
              </select></label>
            </div>
        <br><hr>
            <div class="form-group mt-2">
              <label for="convenioUsuario">Convênio</label>
              <select class="form-control" name="id_convenio" id="convenio">
                <?php foreach ($lista_convenios as $convenio) { ?>
                  <option value="<?= $convenio['id']; ?>"><?= $convenio['nome']; ?></option>
                <?php } ?>
              </select><br>
            </div>
            <div class="form-group">
              <label for="tipoEdi">Tipo</label>
              <select name="tipo" id="tipoUsuario" class="form-control">
                <option value="Cliente">Cliente</option>
                <option value="Funcionario">Funcionario</option>
              </select>
            </div>
          </div>
          <div class="modal-footer mt-5">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-warning mx-2" href="../enderecos/gerenciamento_enderecos.php" target="blank">Gerenciar Endereços</a>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>

<!-- Modal de Cep -->
  <div class="modal fade" id="modalCep" tabindex="-1" role="dialog" aria-labelledby="modalCepLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="../enderecos/cadastrar_endereco.php" method="POST">
      <div class="modal-header d-flex justify-content-center">
        <h5 class="modal-title" id="modalCepLabel">Cadastrar Endereço</h5>
      </div>
      <div class="modal-body">
        <div class="form-group mt-2">
          <label>CEP
          <input name="cep" class="form-control" type="text" id="cep" value="" size="10" maxlength="9"
          onblur="pesquisacep(this.value);" required/></label>
          <label>Rua
          <input name="rua" class="form-control" type="text" id="rua" size="60" /></label>
          <label>Complemento
          <input name="complemento" class="form-control" type="text" id="complemento" size="60" /></label>
          <label>Bairro
          <input name="bairro" class="form-control" type="text" id="bairro" size="40" /></label>
          <label>Cidade
          <input name="cidade" class="form-control" type="text" id="cidade" size="40" /></label><br>
          <label>Estado
          <input name="uf" class="form-control" type="text" id="uf" size="2" /></label>
          <label>DDD
          <input name="ddd" class="form-control" type="text" id="ddd" size="8" /></label>
          <label>Tipo
          <select name="tipo" id="tipo" class="form-control">
            <option value="residencial">Residencial</option>
            <option value="comercial">Comercial</option>
            <option value="clinica">Clinica</option>
          </select></label>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-warning" onclick="limpar_formulario_inteiro();">Limpar campos</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpar_formulario_inteiro();">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
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

  <?php include_once('../../includes/alertas.include.php'); ?>
  <script src="script.js"></script>

</body>

</html>