<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['id_cargo'] == "") {
  //Retornar a tela de login
  header('Location: ../login/index.php');
  die();
}

require_once('../../classes/Usuario.class.php');
$usuario = new Usuario();
$lista_usuariosSemLocalizacao = $usuario->ListarClientesSemLocalizacao();

$lista_usuarioComLocalizacao = $usuario->ListarClientesComLocalizacao();

$lista_funcionarios = $usuario->ListarFuncionarios();

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
              <a class="nav-link active" aria-current="page" href="../../paginainicial.php">Página Inicial</a>
            </li>
            <li class="nav-item dropdown px-3 mt-4">
              <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Gerenciamentos
              </button>
              <ul class="dropdown-menu dropdown-menu px-2">
                <li><a class="dropdown-item" href="../enderecos/gerenciamento_enderecos.php">Endereços</a></li>
                <li><a class="dropdown-item" href="#">Convenios</a></li>
                <li><a class="dropdown-item" href="#">Resultados</a></li>
              </ul>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Exames</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="../agendamentos/gerenciamento_agendamentos.php">Agendamentos</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Suporte</a>
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

  <!-- Container de gerenciamento de clientes sem endereço cadastrado -->
  <div class="container mt-5">
    <h2 class="text-center mb-4">Gerenciamento de Clientes</h2>
    <h5 class="text-center">Clientes sem endereço cadastrado</h5>
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
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Telefone Celular</th>
          <th>Telefone Residencial</th>
          <th>Convênio</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista_usuariosSemLocalizacao as $usuario) { ?>
          <tr>
            <td hidden><?= $usuario['id_usuario']; ?></td>
            <td><?= $usuario['nome']; ?></td>
            <td><?= $usuario['email']; ?></td>
            <td><?= $usuario['cpf']; ?></td>
            <td><?= $usuario['data_nascimento']; ?></td>
            <td><?= $usuario['telefone_celular']; ?></td>
            <td><?= $usuario['telefone_residencial']; ?></td>
            <td hidden><?= $usuario['id_convenio']; ?></td>
            <td><?= $usuario['convenio']; ?></td>
            <td>
            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" 
            data-id="<?=$usuario['id_usuario'];?>" 
            data-nome="<?=$usuario['nome'];?>" 
            data-email="<?=$usuario['email'];?>" 
            data-cpf="<?=$usuario['cpf'];?>" 
            data-data_nascimento="<?=$usuario['data_nascimento'];?>" 
            data-telefone_celular="<?=$usuario['telefone_celular'];?>" 
            data-telefone_residencial="<?=$usuario['telefone_residencial'];?>" 
            data-id_convenio="<?=$usuario['id_convenio'];?>">
            <i class="bi bi-pencil-square"></i> Editar</button>
          </td>
            <td>
              <a href="#" class="btn btn-danger btn-sm" onclick="excluir(<?= $usuario['id_usuario']; ?>)">
              <i class="bi bi-file-earmark-x"></i> Excluir
            </a>
          </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  </div>

  <br><br><br><hr>

    <!-- Container de gerenciamento de clientes com endereço cadastrado -->
    <div class="container mt-5">
    <h2 class="text-center mb-4">Gerenciamento de Clientes</h2>
    <h5 class="text-center">Clientes com endereço cadastrado</h5>
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#modalCadastro"><i class="bi bi-plus-circle"></i> Cadastrar Usuário e Localização</button>
      </div>
    </div>
    <table class="table table-striped table-hover table-primary ">
      <thead>
        <tr>
          <th hidden>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Telefone Celular</th>
          <th>Telefone Residencial</th>
          <th>CEP</th>
          <th>Convênio</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista_usuarioComLocalizacao as $usuario) { ?>
          <tr>
            <td hidden><?= $usuario['id_usuario']; ?></td>
            <td><?= $usuario['nome']; ?></td>
            <td><?= $usuario['email']; ?></td>
            <td><?= $usuario['cpf']; ?></td>
            <td><?= $usuario['data_nascimento']; ?></td>
            <td><?= $usuario['telefone_celular']; ?></td>
            <td><?= $usuario['telefone_residencial']; ?></td>
            <td hidden><?= $usuario['id_local']; ?></td>
            <td><?= $usuario['cep']; ?></td>
            <td hidden><?= $usuario['id_convenio']; ?></td>
            <td><?= $usuario['convenio']; ?></td>
            <td>
            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" 
            data-id="<?=$usuario['id_usuario'];?>" 
            data-nome="<?=$usuario['nome'];?>" 
            data-email="<?=$usuario['email'];?>" 
            data-cpf="<?=$usuario['cpf'];?>" 
            data-data_nascimento="<?=$usuario['data_nascimento'];?>" 
            data-telefone_celular="<?=$usuario['telefone_celular'];?>" 
            data-telefone_residencial="<?=$usuario['telefone_residencial'];?>" 
            data-id_convenio="<?=$usuario['id_convenio'];?>"
            data-id_localizacao="<?=$usuario['id_local'];?>">
            <i class="bi bi-pencil-square"></i> Editar</button>
          </td>
            <td>
              <a href="#" class="btn btn-danger btn-sm" onclick="excluir(<?= $usuario['id_usuario']; ?>)">
              <i class="bi bi-file-earmark-x"></i> Excluir
            </a>
          </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  </div>

  <br><br><br><hr>

  <?php 
  // Se o cargo for = gerente e estiver ativo
  if($_SESSION['usuario']['id_cargo'] == 5){ ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Gerenciamento de Funcionarios</h2>
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#modalCadastro"><i class="bi bi-plus-circle"></i> Cadastrar Funcionário</button>
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
          <th>Convenio</th>
          <th>Cargo</th>
          <th>Especialidade</th>
          <th>Situação</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista_funcionarios as $funcionario) { ?>
          <tr>
            <td hidden><?= $funcionario['id_funcionario']; ?></td>
            <td><?= $funcionario['nome']; ?></td>
            <td><?= $funcionario['email']; ?></td>
            <td hidden><?= $funcionario['senha']; ?></td>
            <td><?= $funcionario['cpf']; ?></td>
            <td><?= $funcionario['data_nascimento']; ?></td>
            <td><?= $funcionario['telefone_celular']; ?></td>
            <td><?= $funcionario['telefone_residencial']; ?></td>
            <td hidden><?= $funcionario['id_localizacao']; ?></td>
            <td><?= $funcionario['cep']; ?></td>
            <td hidden><?= $funcionario['id_convenio']; ?></td>
            <td><?= $funcionario['convenio']; ?></td>
            <td hidden><?= $funcionario['id_cargo']; ?></td>
            <td><?= $funcionario['cargo']; ?></td>
            <td hidden><?= $funcionario['id_especialidade']; ?></td>
            <td><?= $funcionario['especificacao']; ?></td>
            <td><?= $funcionario['situacao']; ?></td>
            <td>
            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" 
            data-id="<?=$funcionario['id_funcionario'];?>" 
            data-nome="<?=$funcionario['nome'];?>" 
            data-email="<?=$funcionario['email'];?>" 
            data-cpf="<?=$funcionario['cpf'];?>" 
            data-data_nascimento="<?=$funcionario['data_nascimento'];?>" 
            data-telefone_celular="<?=$funcionario['telefone_celular'];?>" 
            data-telefone_residencial="<?=$funcionario['telefone_residencial'];?>"
            data-id_localizacao="<?=$funcionario['id_localizacao'];?>"
            data-id_convenio="<?=$funcionario['id_convenio'];?>"
            data-id_cargo="<?=$funcionario['id_cargo'];?>"
            data-id_especialidade="<?=$funcionario['id_especialidade'];?>"
            data-situacao="<?=$funcionario['situacao'];?>">
            <i class="bi bi-pencil-square"></i> Editar</button>
          </td>
            <td>
              <a href="#" class="btn btn-danger btn-sm" onclick="excluir(<?= $funcionario['id_funcionario']; ?>)">
              <i class="bi bi-file-earmark-x"></i> Excluir
            </a>
          </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
  </div>

  <?php }?>

  <!-- Modal de cadastro de usuário -->
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
              <label for="nomeUsuario">Nome</label>
              <input type="text" class="form-control" id="nomeUsuario" placeholder="Digite o nome do cliente" name="nome" required>
            </div>
            <div class="form-group mt-3">
              <label for="emailUsuario">Email</label>
              <input type="email" class="form-control" id="emailUsuario" name="email" placeholder="email@email.com" required>
            </div>
            <div class="form-group mt-3">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha" name="senha" required>
              <input class="mt-3" type="checkbox" class="form-check-input" onclick="mostrarSenha()"> Mostrar Senha
            </div>
            <div class="form-group mt-3">
              <label for="cpfUsuario">CPF</label>
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
              onblur="pesquisacep(this.value);"/></label>
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
                <option value="Residencial">Residencial</option>
                <option value="Comercial">Comercial</option>
                <option value="Clinica">Clinica</option>
              </select></label>
            </div>
            <button type="button" class="btn btn-warning mt-3" onclick="limpar_formulario_inteiro();" id="btn_limpar" hidden>Limpar campos</button>
        <br><hr>
            <div class="form-group mt-2">
              <label for="convenio">Convênio</label>
              <select class="form-control" name="id_convenio" id="convenio">
                <?php foreach ($lista_convenios as $convenio) { ?>
                  <option value="<?= $convenio['id']; ?>"><?= $convenio['nome']; ?></option>
                <?php } ?>
              </select><br>
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

   <!-- Modal de cadastro de funcionario -->
   <div class="modal fade" id="modalCadastroFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalCadastroFuncionario" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="cadastrar_cliente.php" method="POST">
          <div class="modal-header d-flex justify-content-center">
            <h5 class="modal-title" id="modalCadastroFuncionario">Cadastrar novo funcionario</h5>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group mt-3">
              <label for="nomeFuncionario">Nome</label>
              <input type="text" class="form-control" id="nomeUsuario" placeholder="Digite o nome do cliente" name="nome" required>
            </div>
            <div class="form-group mt-3">
              <label for="emailFuncionario">Email</label>
              <input type="email" class="form-control" id="emailUsuario" name="email" placeholder="email@email.com" required>
            </div>
            <div class="form-group mt-3">
              <label for="senhaFuncionario">Senha</label>
              <input type="password" class="form-control" id="senha" name="senhaFuncionario" required>
              <input class="mt-3" type="checkbox" class="form-check-input" onclick="mostrarSenha()"> Mostrar Senha
            </div>
            <div class="form-group mt-3">
              <label for="cpfFuncionario">CPF</label>
              <input type="text" maxlength="11" class="form-control" id="cpfUsuario" name="cpf"></input required>
            </div>
            <div class="form-group mt-3">
              <label for="data_nasciFuncionario">Data de Nascimento</label>
              <input type="date" class="form-control" id="datanasciUsuario" name="data_nascimento"></input>
            </div required>
            <div class="form-group mt-3">
              <label for="telcelFuncionario">Telefone Celular</label>
              <input type="tel" class="form-control" id="telcelUsuario" maxlenght="14" placeholder="(DDD) 9 9999-9999" name="telefone_celular">
            </div>
            <div class="form-group mt-3">
              <label for="telresFuncionario">Telefone Residencial</label>
              <input type="tel" class="form-control" id="telresUsuario" maxlenght="14" placeholder="(DDD) 9 9999-9999" name="telefone_residencial">
            </div>
            <br>
            <hr>
            <div class="form-group mt-2">
              <label>CEP
              <input name="cep" class="form-control" type="text" id="cep" size="10" maxlength="9"
              onblur="pesquisacep(this.value);"/></label>
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
                <option value="Residencial">Residencial</option>
                <option value="Comercial">Comercial</option>
                <option value="Clinica">Clinica</option>
              </select></label>
            </div>
            <button type="button" class="btn btn-warning mt-3" onclick="limpar_formulario_inteiro();" id="btn_limpar" hidden>Limpar campos</button>
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

<!-- Modal de edição -->
<div class="modal fade" id="modalEdicao" tabindex="-1" role="dialog" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="editar_cliente.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEdicaoLabel">Edição de cliente</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="id" name="id">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control nome" id="nome" name="nome">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control email" id="email" name="email"> 
                    </div>
                    <div class="form-group mt-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control cpf" id="cpf" name="cpf"> 
                    </div>
                    <div class="form-group mt-3">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control data_nascimento" id="data_nascimento" name="data_nascimento"> 
                    </div>
                    <div class="form-group mt-3">
                        <label for="telefone_celular">Telefone Celular</label>
                        <input type="tel" class="form-control telefone_celular" id="telefone_celular" name="telefone_celular"> 
                    </div>
                    <div class="form-group mt-3">
                        <label for="telefone_residencial">Telefone Residencial</label>
                        <input type="tel" class="form-control telefone_residencial" id="telefone_residencial" name="telefone_residencial"> 
                    </div>
                    <div class="form-group mt-2">
                      <label for="id_convenio">Convênio</label>
                      <select class="form-control id_convenio" name="id_convenio" id="id_convenio">
                      <?php foreach ($lista_convenios as $convenio) { ?>
                        <option value="<?= $convenio['id']; ?>"><?= $convenio['nome']; ?></option>
                      <?php } ?>
                      </select><br>
                    </div>
                    <div class="form-group">
                      <label for="tipo">Tipo</label>
                      <select name="tipo" id="tipo" class="form-control">
                        <option value="Cliente">Cliente</option>
                        <option value="Funcionario">Funcionario</option>
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
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
  <!-- API ViaCEP -->
  <script src="../enderecos/viacep/script.js"></script>

  <script>
  $('#modalEdicao').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 

  var id = button.data('id')
  var nome = button.data('nome')
  var email = button.data('email')
  var cpf = button.data('cpf')
  var data_nascimento = button.data('data_nascimento')
  var telefone_celular = button.data('telefone_celular')
  var telefone_residencial = button.data('telefone_residencial')
  var id_convenio = button.data('id_convenio')
  var id_localizacao = button.data('id_localizacao')

  var modal = $(this)

  modal.find('.id').val(id)
  modal.find('.nome').val(nome)
  modal.find('.email').val(email)
  modal.find('.cpf').val(cpf)
  modal.find('.data_nascimento').val(data_nascimento)
  modal.find('.telefone_celular').val(telefone_celular)
  modal.find('.telefone_residencial').val(telefone_residencial)
  modal.find('.id_convenio').val(id_convenio)
  modal.find('.id_localizacao').val(id_localizacao)

  })
  </script>

</body>

</html>