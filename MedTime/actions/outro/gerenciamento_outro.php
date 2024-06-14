<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['id_cargo'] == "") {
  //Retornar a tela de login
  header('Location: ../login/index.php');
  die();
}

require_once('../../classes/Convenio.class.php');

$convenio = new Convenio();
$lista_convenios = $convenio->Listar();

require_once('../../classes/Cargos.class.php');
$cargo = new Cargos();
$lista_cargos = $cargo->Listar();

require_once('../../classes/Especialidade.class.php');
$especialidade = new Especialidade();
$lista_especialidades = $especialidade->Listar();

require_once('../../classes/Exame.class.php');
$exame = new Exame();
$lista_exames = $exame->Listar();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento Extra</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootsstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="shortcut icon" type="image/png" href="../img/favico.png">

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
              <a class="nav-link active" aria-current="page" href="../clientes/gerenciamento_clientes.php">Página Inicial</a>
            </li>
            <li class="nav-item dropdown px-3 mt-4">
              <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Gerenciamentos
              </button>
              <ul class="dropdown-menu dropdown-menu px-2">
                <li><a class="dropdown-item" href="../clientes/gerenciamento_clientes.php">Clientes</a></li>
                <li><a class="dropdown-item" href="../agendamentos/gerenciamento_agendamentos.php">Agendamentos</a></li>
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


  <!-- Container de gerenciamento de convênios -->
  <div class="container-sm mt-5">
    <h2 class="text-center mb-4">Gerenciamento de Convênios</h2>
    <table class="table table-striped table-hover table-primary ">
      <thead>
        <tr>
          <th hidden>ID</th>
          <th>Nome do Convênio</th>
          <th>Email</th>
          <th>Telefone</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista_convenios as $convenio) { ?>
          <tr>
            <td hidden><?= $convenio['id']; ?></td>
            <td><?= $convenio['nome']; ?></td>
            <td><?= $convenio['email']; ?></td>
            <td><?= $convenio['telefone']; ?></td>
            <td>
              <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" data-id="<?= $convenio['id']; ?>" data-convenio="<?= $convenio['nome']; ?>" data-email="<?= $convenio['email']; ?>" data-telefone="<?= $convenio['telefone']; ?>">
                <i class="bi bi-pencil-square"></i> Editar</button>
            </td>
            <td>
              <a href="#" class="btn btn-danger btn-sm" onclick="excluir(<?= $convenio['id']; ?>)">
                <i class="bi bi-file-earmark-x"></i> Excluir Convênio
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>


  <?php if ($_SESSION['usuario']['id_cargo'] == 5) { ?>

    <!-- Container de gerenciamento de cargos -->
    <div class="row mt-3">
      <div class="col-12">
        <div class="container-sm mt-5">
          <h4 class="mb-4">Gerenciamento de Cargos</h4>
          <div class="col-4">
            <table class="table table-striped table-hover table-primary ">
              <thead>
                <tr>
                  <th hidden>ID</th>
                  <th>Nome do Cargo</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($lista_cargos as $cargo) { ?>
                  <tr>
                    <td hidden><?= $cargo['id']; ?></td>
                    <td><?= $cargo['nome']; ?></td>
                    <td>
                      <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" data-id="<?= $cargo['id']; ?>" data-nome="<?= $cargo['nome']; ?>">
                        <i class="bi bi-pencil-square"></i> Editar</button>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-sm" onclick="excluirCargo(<?= $cargo['id']; ?>)">
                        <i class="bi bi-file-earmark-x"></i> Excluir
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <!-- Container de gerenciamento de especialidade -->

      <div class="col-12">
        <div class="container-sm mt-5">
          <h4 class="mb-4">Gerenciamento de Especialidade</h4>
          <div class="col-6">
            <table class="table table-striped table-hover table-primary ">
              <thead>
                <tr>
                  <th hidden>ID</th>
                  <th>Nome da Especialidade</th>
                  <th>Nome do Cargo</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($lista_especialidades as $especialidade) { ?>
                  <tr>
                    <td hidden><?= $especialidade['id']; ?></td>
                    <td><?= $especialidade['especificacao']; ?></td>
                    <td hidden><?= $especialidade['id_cargo']; ?></td>
                    <td><?= $especialidade['nome']; ?></td>
                    <td>
                      <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" data-id="<?= $especialidade['id']; ?>" data-especificacao="<?= $especialidade['especificacao']; ?>" data-id_cargo="<?= $especialidade['id_cargo']; ?>" data-nome_cargo="<?= $especialidade['nome']; ?>">
                        <i class="bi bi-pencil-square"></i> Editar</button>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-sm" onclick="excluirEspecialidade(<?= $especialidade['id']; ?>)">
                        <i class="bi bi-file-earmark-x"></i> Excluir
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Container de gerenciamento de exames -->
      <div class="col-12">
        <div class="container-sm">
          <h4 class="mb-4">Gerenciamento de Exames</h4>
          <div class="col-6">
            <table class="table table-striped table-hover table-primary ">
              <thead>
                <tr>
                  <th hidden>ID</th>
                  <th>Nome do Exame</th>
                  <th>Funcionário Responsável</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($lista_exames as $exame) { ?>
                  <tr>
                    <td hidden><?= $exame['id']; ?></td>
                    <td><?= $exame['nome']; ?></td>
                    <td hidden><?= $exame['id_responsavel']; ?></td>
                    <td><?= $exame['funcionario_resp']; ?></td>
                    <td>
                      <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" data-id="<?= $exame['id']; ?>" data-nome="<?= $exame['nome']; ?>" data-id_resp="<?= $exame['id_responsavel']; ?>" data-funcionario_resp="<?= $exame['funcionario_resp']; ?>">
                        <i class="bi bi-pencil-square"></i> Editar</button>
                    </td>
                    <td>
                      <a href="#" class="btn btn-danger btn-sm" onclick="excluirExame(<?= $exame['id']; ?>)">
                        <i class="bi bi-file-earmark-x"></i> Excluir
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    <?php } ?>
    </div>
    <!-- Modais -->

    <!-- Modal de edição -->
    <div class="modal fade" id="modalEdicao" tabindex="-1" role="dialog" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="editar_cliente.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEdicaoLabel">Edição de cliente</h5>
            </div>
            <nav class="navbar bg-body-tertiary">
              <div class="container-fluid">
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="CPF do Cliente" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" name="cpf" id="cpf">Pesquisar</button>
                </form>
              </div>
            </nav>
            <div class="modal-body">
              <input type="hidden" class="id" name="id" id="id">
              <div class="form-group">
                <label for="paciente">Paciente</label>
                <select class="form-control paciente" id="paciente" name="paciente">
                  <?php foreach ($listar_cpf as $cpf) { ?>
                    <option value="<?= $cpf['id']; ?>"><?= $cpf['nome']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="medico">Médico</label>
                <br>
                <select class="form-control medico" id="medico" name="medico" required>
                  <?php foreach ($listar_medico as $medico) { ?>
                    <option value="<?= $medico['id']; ?>" name="id_medico"><?= $medico['nome']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="exame">Exame</label>
                <br>
                <select class="form-control exame" id="exames" name="exame" required>
                  <?php foreach ($listar_exame as $exame) { ?>
                    <option value="<?= $exame['id']; ?>"><?= $exame['nome']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="convenio">Convênio</label>
                <br>
                <select class="form-control convenio" name="convenio" id="convenios">
                  <?php foreach ($lista_convenios as $convenio) { ?>
                    <option value="<?= $convenio['id']; ?>"><?= $convenio['nome']; ?></option>
                  <?php } ?>
                </select><br>
              </div>
              <div class="form-group mt-3">
                <label for="endereco">Endereço Clinica</label>
                <br>
                <select class="form-control endereco" name="endereco" id="endereco">
                  <?php foreach ($listar_clinica as $clinica) { ?>
                    <option value="<?= $clinica['id']; ?>"><?= $clinica['complemento']; ?></option>
                  <?php } ?>
                </select><br>
              </div>
              <div class="form-group mt-3">
                <label for="data_consulta">Data Consulta</label>
                <input type="date" class="form-control data_consulta" id="data_consulta" name="data_consulta">
              </div>
              <div class="form-group mt-2">
                <label for="situacao">Situação</label>
                <input type="text" class="form-control situacao" id="situacao" name="situacao">
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

    <!-- Modal de cadastro -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="cadastrar_endereco.php" method="POST">
            <div class="modal-header d-flex justify-content-center">
              <h5 class="modal-title" id="modalCadastroLabel">Cadastrar novo endereço</h5>
            </div>
            <div class="modal-body">
              <div class="form-group mt-2">
                <label id="cepLabel">CEP
                  <input name="cep" class="form-control" type="text" id="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);" /></label>

                <label hidden id="ruaLabel">Rua
                  <input name="rua" class="form-control" type="text" id="rua" size="60" hidden /></label>
                <label hidden id="complementoLabel">Complemento
                  <input name="complemento" class="form-control" type="text" id="complemento" size="60" /></label>
                <label hidden id="bairroLabel">Bairro
                  <input name="bairro" class="form-control" type="text" id="bairro" size="40" hidden /></label>
                <label hidden id="cidadeLabel">Cidade
                  <input name="cidade" class="form-control" type="text" id="cidade" size="40" hidden /></label><br>
                <label hidden id="ufLabel">Estado
                  <input name="uf" class="form-control" type="text" id="uf" size="2" hidden /></label>
                <label hidden id="dddLabel">DDD
                  <input name="ddd" class="form-control" type="text" id="ddd" size="8" hidden /></label>
                <label hidden id="tipoLabel">Tipo
                  <select name="tipoLocal" id="tipo" class="form-control" hidden>
                    <option value="Residencial">Residencial</option>
                    <option value="Comercial">Comercial</option>
                    <option value="Clinica">Clinica</option>
                  </select></label>
              </div>
              <button type="button" class="btn btn-warning mt-3" onclick="limpar_formulario_inteiro();" id="btn_limpar" hidden>Limpar campos</button>
            </div>
            <div class="modal-footer mt-5">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
        </form>
      </div>
    </div>
    </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <?php include_once('../../includes/alertas.include.php') ?>

    <script src="script.js"></script>
    <script src="../especialidades/script.js"></script>
    <script src="../cargos/script.js"></script>
    <script src="../exames/script.js"></script>

    <script>
      function excluirEspecialidade(id) {
        Swal.fire({
          title: "Tem certeza?",
          text: "Não será possível desfazer essa ação!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          cancelButtonText: "Cancelar",
          confirmButtonText: "Sim, apagar!"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = '../especialidades/deletar_especialidade.php?id=' + id;
          }
        });
      }

      function excluirCargo(id) {
        Swal.fire({
          title: "Tem certeza?",
          text: "Não será possível desfazer essa ação!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          cancelButtonText: "Cancelar",
          confirmButtonText: "Sim, apagar!"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = '../cargos/deletar_cargo.php?id=' + id;
          }
        });
      }
    </script>

</body>

</html>