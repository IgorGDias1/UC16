 <?php

    require_once('../../classes/Convenio.class.php');
    $convenio = new Convenio();
    $listar_convenios = $convenio->Listar();

    ?>

 <!-- Modais -->

 <!-- Modal de cadastro de convênio -->
 <div class="modal fade" id="modalCadastroConvenio" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form action="convenio/cadastrar_convenio.php" method="POST">
                 <div class="modal-header d-flex justify-content-center">
                     <h5 class="modal-title" id="modalCadastroLabel">Novo Convênio</h5>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group mt-3">
                         <label for="nomeConvenio">Nome Convênio</label>
                         <br>
                         <input type="text" class="form-control" id="convenio" name="convenio"></input>
                     </div>
                     <div class="form-group mt-3">
                         <label for="email">Email</label>
                         <br>
                         <input type="email" class="form-control" id="email" name="email"></input>
                     </div>
                     <div class="form-group mt-3">
                         <label for="telefone">Telefone</label>
                         <br>
                         <input type="tel" class="form-control" id="telefone" name="telefone"></input>
                     </div>
                 </div>
                 <div class="modal-footer mt-5">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                     <button type="submit" class="btn btn-success">Salvar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal de cadastro de exame-->
 <div class="modal fade" id="modalCadastroExame" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form action="exames/cadastrar_exame.php" method="POST">
                 <div class="modal-header d-flex justify-content-center">
                     <h5 class="modal-title" id="modalCadastroLabel">Novo Exame</h5>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group mt-3">
                         <label for="nomeExame">Nome Exame</label>
                         <br>
                         <input type="text" class="form-control" id="exame" name="exame"></input>
                     </div>
                     <div class="form-group mt-3">
                         <label for="responsavel">Responsável</label>
                         <br>
                         <select class="form-control" id="responsavel" name="responsavel" required>
                             <?php foreach ($listar_medicos as $med) { ?>
                                 <option value="<?= $med['id']; ?>"><?= $med['nome']; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                 </div>
                 <button type="button" class="btn btn-warning mt-3" onclick="limpar_formulario_inteiro();" id="btn_limpar" hidden>Limpar campos</button>
                 <div class="modal-footer mt-5">
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                     <button type="submit" class="btn btn-success">Salvar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>


 <!-- Modal de edição Convênio-->
 <div class="modal fade" id="modalEdicaoConvenio" tabindex="-1" role="dialog" aria-labelledby="modalEdicaoLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <form action="convenio/editar_convenio.php" method="POST">
                 <div class="modal-header">
                     <h5 class="modal-title" id="modalEdicaoLabel">Edição de Convênio</h5>
                 </div>
                 <div class="modal-body">
                     <input type="hidden" class="id" name="id" id="id">
                     <div class="form-group">
                         <label for="covenio">Nome Convênio</label>
                         <select class="form-control nome" id="convenio" name="convenio">
                             <?php foreach ($listar_convenios as $c) { ?>
                                 <option value="<?= $c['id']; ?>"><?= $c['nome']; ?></option>
                             <?php } ?>
                         </select>
                     </div>
                     <div class="form-group mt-3">
                         <label for="email">Email</label>
                         <br>
                         <input class="form-control email" id="email" name="email" required>
                     </div>
                     <div class="form-group mt-3">
                         <label for="telefone">Telefone</label>
                         <br>
                         <input class="form-control telefone" id="telefone" name="telefone" required>
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