<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['id_cargo'] == "") {
  //Retornar a tela de login
  header('Location: ../login/index.php');
  die();
}

require_once('../../classes/Agendamento.class.php');

$agendamento = new Agendamento();
$lista_agendamentos = $agendamento->ListarPendente();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atendimento</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootsstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link rel="shortcut icon" type="image/png" href="../img/favico.png">

</head>

<body>
  <div class="container mt-5">
    <?php
    include_once("../../includes/navbargerente.include.php");
    ?>

    <!-- Container de gerenciamento / Endereços já cadastrados -->
    <?php date_default_timezone_set('America/Sao_Paulo') ?>

    <h2 class="text-center mb-4 mt-4">Agendamentos do dia <?php echo date("d/m/y") ?></h2>

    <div class="container mt-5 me-3 ms-3">
      <div class="row justify-content-center table-responsive">
        <div class="col">
          <table class="table table-striped table-hover table-primary text-center">
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
              <?php foreach ($lista_agendamentos as $agendamento) { ?>
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
                    <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicao" data-id="<?= $agendamento['id']; ?>" data-paciente="<?= $agendamento['paciente']; ?>" data-medico="<?= $agendamento['médico']; ?>" data-exame="<?= $agendamento['id_exame']; ?>" data-convenio="<?= $agendamento['id_convenio']; ?>" data-clinica="<?= $agendamento['id_clinica']; ?>" data-data_consulta="<?= $agendamento['data consulta']; ?>" data-situacao="<?= $agendamento['situacao']; ?>">
                      <i class="bi bi-pencil-square"></i> Editar</button>
                  </td>
                  <td>
                    <a href="#" class="btn btn-success btn-sm" onclick="concluirAtendimento(<?= $agendamento['id']; ?>)">
                      <i class="bi bi-file-earmark-x"></i> Concluir Atendimento
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
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

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <?php include_once('../../includes/alertas.include.php') ?>

  <script src="script.js"></script>

</body>

</html>