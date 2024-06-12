<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['id_cargo'] == "") {
  //Retornar a tela de login
  header('Location: ../login/index.php');
  die();
}

require_once('../../classes/Usuario.class.php');
$u = new Usuario();
$listar_usuario = $u->ListarClientes();
$listar_medico = $u->ListarMedicos();
$listar_cpf = $u->ListarPorCPF();

require_once('../../classes/Agendamento.class.php');
$a = new Agendamento();
$listar_agendamentos = $a->Listar();

require_once('../../classes/Localizacao.class.php');
$localizacao = new Localizacao();
$lista_localizacao = $localizacao->Listar();
$listar_clinica = $localizacao->ListarClinicas();

require_once('../../classes/Convenio.class.php');
$convenio = new Convenio();
$lista_convenios = $convenio->Listar();

require_once('../../classes/Exame.class.php');
$exame = new Exame();
$listar_exame = $exame->Listar();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendamentos</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootsstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="shortcut icon" type="image/png" href="../img/favico.png">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
              <a class="nav-link active" aria-current="page" href="../clientes/gerenciamento_clientes.php">Página Inicial</a>
            </li>
            <li class="nav-item dropdown px-3 mt-4">
              <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Gerenciamentos
              </button>
              <ul class="dropdown-menu dropdown-menu px-2">
              <li><a class="dropdown-item" href="../clientes/gerenciamento_clientes.php">Clientes</a></li>
                <li><a class="dropdown-item" href="../enderecos/gerenciamento_enderecos.php">Endereços</a></li>
                <li><a class="dropdown-item" href="#">Convenios</a></li>
                <li><a class="dropdown-item" href="#">Resultados</a></li>
              </ul>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="../atendimento/atendimento.php">Atendimento</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Exames</a>
            </li>
            <li class="nav-item px-3 mt-4">
              <a class="nav-link" href="#">Agendamentos</a>
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

  <!-- Container de gerenciamento -->
  <div class="container mt-5">
    <h2 class="text-center mb-4">Agendamentos</h2>
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#modalCadastro"><i class="bi bi-plus-circle"></i> Cadastrar Agendamento</button>
      </div>
    </div>
    <table class="table table-striped table-hover table-primary ">
      <thead>
        <tr>
          <th hidden>ID</th>
          <th>Paciente</th>
          <th>Médico</th>
          <th>Exame</th>
          <th>Convenio</th>
          <th>Endereço</th>
          <th>Data da Consulta</th>
          <th>Situação</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($listar_agendamentos as $agendamento) { ?>
          <tr>
            <td hidden><?= $agendamento['id']; ?></td>
            <td><?= $agendamento['paciente']; ?></td>
            <td><?= $agendamento['médico']; ?></td>
            <td><?= $agendamento['exame']; ?></td>
            <td><?= $agendamento['convenio']; ?></td>
            <td><?= $agendamento['clinica']; ?></td>
            <td><?= $agendamento['data consulta']; ?></td>
            <td><?= $agendamento['situacao']; ?></td>
            <td>
              <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" 
              data-id="<?= $agendamento['id']; ?>" 
              data-paciente="<?= $agendamento['paciente']; ?>" 
              data-medico="<?= $agendamento['médico']; ?>" 
              data-exame="<?= $agendamento['id_exame']; ?>" 
              data-convenio="<?= $agendamento['id_convenio']; ?>" 
              data-clinica="<?= $agendamento['id_clinica']; ?>" 
              data-data_consulta="<?= $agendamento['data consulta']; ?>" 
              data-situacao="<?= $agendamento['situacao']; ?>">
              <i class="bi bi-pencil-square"></i> Editar</button>
            </td>
            <td>
              <a href="#" class="btn btn-danger btn-sm" onclick="excluir(<?= $agendamentos['id']; ?>)">
                <i class="bi bi-file-earmark-x"></i> Excluir
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Modal de cadastro -->
  <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="cadastrar_agendamento.php" method="POST">
          <div class="modal-header d-flex justify-content-center">
            <h5 class="modal-title" id="modalCadastroLabel">Novo Agendamento</h5>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group mt-3">
              <label for="nomePaciente">Paciente</label>
              <br>
              <select class="form-control " id="paciente" name="paciente" multiple="multiple" style="width: 100%">
                <?php foreach ($listar_usuario as $u) { ?>
                  <option value="<?= $u['id']; ?>" name="id_medico"><?= $u['nome']; ?></option>
                <?php } ?>
              </select>
            </div>

            <br>
            <a class="btn btn-success " href="../clientes/gerenciamento_clientes.php" target="blank">Cadastrar Cliente</a>
            
            <div class="form-group mt-3">
              <label for="nomeMedico">Médico</label>
              <br> 
              <select class="form-control " id="nomeMedico" name="medico" required>
                <?php foreach ($listar_medico as $medico) { ?>
                  <option value="<?= $medico['id']; ?>" name="id_medico"><?= $medico['nome']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group mt-3">
              <label for="exame">Exame</label>
              <br>
              <select class="form-control " id="exame" name="exame" required>
                <?php foreach ($listar_exame as $exame) { ?>
                  <option value="<?= $exame['id']; ?>"><?= $exame['nome']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group mt-2">
              <label for="convenio">Convênio</label>
              <br>
              <select class="form-control" name="convenio" id="convenio">
                <?php foreach ($lista_convenios as $convenio) { ?>
                  <option value="<?= $convenio['id']; ?>"><?= $convenio['nome']; ?></option>
                <?php } ?>
              </select><br>
            </div>
            <div class="form-group mt-2">
              <label for="clinica">Endereço Clinica</label>
              <br>
              <select class="form-control" name="clinica" id="clinica">
                <?php foreach ($listar_clinica as $clinica) { ?>
                  <option value="<?= $clinica['id']; ?>"><?= $clinica['complemento']; ?></option>
                <?php } ?>
              </select><br>
            </div>
            <div class="form-group mt-3">
              <label for="data_consPaciente">Data da Consulta</label>
              <input type="date" class="form-control" id="data_consPaciente" name="data_consulta"></input>
            </div required>
            <br>
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


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <?php include_once('../../includes/alertas.include.php'); ?>

  <script>
    $('#paciente').select2({
        dropdownParent: $('#modalCadastro')
    });
  </script>

  <script src="script.js"></script>
  <!-- API ViaCEP -->
  <script src="../enderecos/viacep/script.js"></script>

  <script>
    $('#modalEdicao').on('show.bs.modal', function(event) {

      var button = $(event.relatedTarget)

      var id = button.data('id')
      var paciente = button.data('paciente')
      var medico = button.data('médico')
      var exame = button.data('exame')
      var convenio = button.data('convenio')
      var endereco = button.data('clinica')
      var data_consulta = button.data('data_consulta')
      var situacao = button.data('situacao')

      var modal = $(this)

      modal.find('.id').val(id)
      modal.find('.paciente').val(paciente)
      modal.find('.medico').val(medico)
      modal.find('.exame').val(exame)
      modal.find('.convenio').val(convenio)
      modal.find('.endereco').val(endereco)
      modal.find('.data_consulta').val(data_consulta)
      modal.find('.situacao').val(situacao)

    })
  </script>

</body>

</html>