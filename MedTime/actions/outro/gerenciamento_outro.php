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

require_once("../../classes/Usuario.class.php");
$u = new Usuario();
$listar_medicos = $u->ListarMedicos();

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

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link rel="shortcut icon" type="image/png" href="../img/favico.png">

</head>

<body>

  <!-- Container principal -->
  <div class="container-fluid mt-5">

    <div class="container mt-5">
      <?php
      include_once("../../includes/navbargerente.include.php");
      ?>

      <!-- Container de gerenciamento de convênios -->
      <div class="row mt-2">
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
                  <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdicaoConvenio" 
                  data-id="<?= $convenio['id']; ?>" 
                  data-nome="<?= $convenio['nome']; ?>" 
                  data-email="<?= $convenio['email']; ?>" 
                  data-telefone="<?= $convenio['telefone']; ?>">
                    <i class="bi bi-pencil-square"></i> Editar</button>
                </td>
                <td>
                  <a href="#" class="btn btn-danger btn-sm" onclick="excluirConvenio(<?= $convenio['id']; ?>)">
                    <i class="bi bi-file-earmark-x"></i> Excluir Convênio
                  </a>
                </td>
                <td>
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalCadastroConvenio"><i class="bi bi-plus-circle"></i> Cadastrar Convênio</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalEdicaoConvenio" tabindex="-1" role="dialog" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="convenio/editar_convenio.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEdicaoLabel">Edição de Convênio</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="id" name="id" id="id">
                            <div class="form-group mt-2">
                                <label for="nome">Nome do Convênio</label>
                                <input type="text" class="form-control nome" id="nome" name="nome">
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">E-mail do convênio</label>
                                <input type="email" class="form-control email" id="email" name="email">
                            </div>
                            <div class="form-group mt-2">
                                <label for="telefone">Telefone de contato</label>
                                <input type="tel" class="form-control telefone" id="telefone" name="telefone">
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


  <!-- PUXAR INCLUDE DOS MODAIS DE GERENCIAMENTO -->
  <?php include_once('../../includes/modais_gerenciamento.include.php') ?>

  <?php include_once('../../includes/alertas.include.php') ?>



  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



  <script src="script.js"></script>
  <script src="../especialidades/script.js"></script>
  <script src="../cargos/script.js"></script>
  <script src="../exames/script.js"></script>
  

  <script>
    $('#responsavel').select2({
      dropdownParent: $('#modalCadastroExame')
    });
  </script>

  <script>
    function excluirConvenio(id) {
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
          window.location.href = 'convenio/deletar_convenio.php?id=' + id;
        }
      });
    }

     $('#modalEdicaoConvenio').on('show.bs.modal', function(event) {

         var button = $(event.relatedTarget)

         var id = button.data('id')
         var nome = button.data('nome')
         var email = button.data('email')
         var telefone = button.data('telefone')

         var modal = $(this)

         modal.find('.id').val(id)
         modal.find('.nome').val(nome)
         modal.find('.email').val(email)
         modal.find('.telefone').val(telefone)

     })
 
  </script>

</body>

</html>