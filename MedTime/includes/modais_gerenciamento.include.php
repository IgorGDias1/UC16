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
                 <button type="button" class="btn btn-warning mt-3" onclick="limpar_formulario_inteiro();" id="btn_limpar" hidden>Limpar campos</button>
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
                         <select class="form-control" id="responsavel" name="responsavel" multiple="multiple" style="width: 100%" required>
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