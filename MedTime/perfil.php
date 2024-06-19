<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: paginainicial.php?neutro=perfil');
    die();
}

require_once('classes/Usuario.class.php');
$usuario = new Usuario();
$usuario->id = $_SESSION['usuario']['id'];


$info = $usuario->ListarPorID();

require_once('classes/Localizacao.class.php');
$localizacao = new Localizacao();
$localizacao->id = $_SESSION['usuario']['id_localizacao'];

$infoLocal = $localizacao->ListarPorID();

require_once('classes/Resultado.class.php');
$resultado = new Resultado();
$resultado->id_cliente = $_SESSION['usuario']['id'];

$historicoResultado = $resultado->ListarPorIDCliente();

require_once('classes/Agendamento.class.php');
$agendamento = new Agendamento();
$agendamento->id_cliente = $_SESSION['usuario']['id'];

$infoAgendamento = $agendamento->ListarPorIDPaciente();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedTime</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" type="image/png" href="img/favico.png">

    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="CSS_e_JS/style.css">

    <!-- Movimento logo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <!-- Removendo a setinha do input number -->
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>



    <!-- api google fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Amatic+SC:wght@400;700&family=Bungee&family=Bungee+Spice&family=Press+
        Start+2P&family=Righteous&family=Rubik+Doodle+Shadow&family=Uchen&display=swap" rel="stylesheet">
</head>

<body>
    
<div class="container-fluid">
    <?php
    include_once("includes/elementos.include.php");
    ?>

        <div class="row mt-3 ms-4 me-3">
            <div class="col-md-4 mb-3">
                <img src="img/profile.png" class="rounded-circle border border-black img-fluid mx-auto d-block" width="200px" alt="...">
                <div class="d-grid gap-2 me-3">
                    <div class="btn-group-vertical mt-5" role="group" aria-label="Vertical button group">
                        <button type="button" class="btn btn-primary" id="btnAgendamentos" onclick="mostrarInformacoesAgendamento()">Meus agendamentos</button>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                        <button type="button" class="btn btn-primary" id="btnPerfil" onclick="mostrarInformacoesPerfil()" hidden>Meu perfil</button>
                    </div>
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                        <button type="button" class="btn btn-primary" id="btnResultados" onclick="mostrarInformacoesResultados()">Meus resultados</button>
                    </div>
                </div>


            </div>

            <div class="col-7 mt-5 ms-5" id="agendamentosInfo" hidden>
                <!-- Informações de agendamentos do usuário -->

                <?php if (count($infoAgendamento) == 0) { ?>
                    <h6 class="text-center"><b>Nenhum Agendamento Encontrado</b></h6>
                <?php } ?>
                <?php foreach ($infoAgendamento as $infoA) { ?>
                    <div class="card" id="cardAgendamento">
                        <div class="card-body">
                            <h5 class="card-title">Data: <?= $infoA['data consulta']; ?></h5>
                            <hr>
                            <p class="card-text fs-6"><b><?= $infoA['situacao']; ?></b> - <?= $infoA['exame']; ?></p>
                            <a class="btn btn-primary btn-sm text-light" href="agendamento_cliente.php?id=<?= $infoA['id']; ?>">Ver Agendamento</a>
                            <!-- Fim do corpo do Card -->
                        </div>
                        <!-- Fim do Card -->
                    </div>

                    <br>
                <?php } ?>
            </div>


            <div class="col-7 mt-5 ms-5" id="resultadoInfos" hidden>
                <!-- Informações de resultados do usuário -->
                <?php if (count($historicoResultado) == 0) { ?>
                    <h6 class="text-center"><b>Nenhum Resultado Registrado</b></h6>
                <?php } ?>
                <?php foreach ($historicoResultado as $hR) { ?>
                    <div class="card" id="cardResultado">
                        <div class="card-body">
                            <h5 class="card-title"><?= $hR['resultado']; ?></h5>
                            <p class="card-text">Consulta realizada em: <?= $hR['data_realizacao']; ?></p>
                            <a class="btn btn-primary btn-sm text-light" href="resultado.php?id=<?= $hR['id_resultado']; ?>">Ver Resultado</a>
                            <!-- Fim do corpo do Card -->
                        </div>
                        <!-- Fim do Card -->
                    </div>

                    <br>

                <?php } ?>
            </div>


            <!-- WIP -->
            <div class="col-md-8 rounded-3 border border-3 mb-2" hidden>
                <p class="h2 text-center">Meus Exames</p>
                <input class="form-control form-control-lg mb-2 w-75" name="nomeexame" id="nomexame" type="text" placeholder="Nome do exame" aria-label=".form-control-lg example">
                <input class="form-control form-control-lg mb-2 w-75" name="dataexame" id="dataexame" type="text" placeholder="data da realização" aria-label=".form-control-lg example">
                <input class="form-control form-control-lg mb-2 w-75" name="medicoexame" id="medicoexame" type="text" placeholder="Médico responsável" aria-label=".form-control-lg example">
                <input class="form-control form-control-lg mb-2 w-75" name="resultadoexame" id="resultadoexame" type="text" placeholder="Resultado" aria-label=".form-control-lg example">
                <input class="form-control form-control-lg mb-2 w-75" name="situacaoexame" id="situacaoexame" type="text" placeholder="Situação" aria-label=".form-control-lg example">
            </div>

            <div class="col-md-8 rounded-3 border border-black mb-3" id="usuarioInfo">
                <!-- Informações do usuário -->
                <?php foreach ($info as $i) { ?>
                    <p class="h4 text-center mt-3 mb-3">Dados pessoais</p>

                    <form action="actions/login/editar_cliente.php" method="POST" onkeyup="habilitarEdicao()">
                        <input type="hidden" value="<?=$i['id_usuario'];?>" name="idCliente">
                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Nome Completo" aria-label=".form-control-lg example" value="<?= $i['nome']; ?>" name="nomeCliente" required>
                            <label for="floatingInput">Nome</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="email" placeholder="Email" aria-label=".form-control-lg example" value="<?= $i['email']; ?>" name="emailCliente" required>
                            <label for="floatingInput">Email</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="number" placeholder="CPF" aria-label=".form-control-lg example" value="<?= $i['cpf']; ?>" name="cpfCliente" required>
                            <label for="floatingInput">CPF</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="date" placeholder="data de nascimento" aria-label=".form-control-lg example" value="<?= $i['data_nascimento']; ?>" name="data_nasciCliente" required>
                            <label for="floatingInput">Data de Nascimento</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="tel" placeholder="Telefone Celular" aria-label=".form-control-lg example" value="<?= $i['telefone_celular']; ?>" name="telefone_celCliente">
                            <label for="floatingInput">Telefone Celular</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="tel" placeholder="Telefone Residencial" aria-label=".form-control-lg example" value="<?= $i['telefone_residencial']; ?>" name="telefone_resCliente">
                            <label for="floatingInput">Telefone Residencial <i>(Opcional)</i></label>
                        </div>
                        
                        <?php if($i['id_convenio'] > 0 ) { ?>
                        <div class="form-floating mt-4">
                            <input type="hidden" value="<?=$i['id_convenio'];?>" name="id_convenio">
                            <input class="form-control form-control-lg mb-2 w-75" type="tel" placeholder="Convênio" aria-label=".form-control-lg example" value="<?= $i['convenio']; ?>" name="convenioCliente" readonly>
                            <label for="floatingInput">Convênio</label>
                        </div>
                        <?php } else { ?>
                            <a href="contate_nos.php" target="blank" class="btn btn-primary btn-sm mt-3">Adicionar um Convênio</a>
                            <?php } ?>

                        <button class="btn btn-primary btn-sm mt-3" type="submit" id="btnEditarInfo" disabled>Alterar Informações Pessoais</button>
                    </form>

                <?php } ?>

                <br>
                <hr><br>

                <!-- Caso o usuário não possui um endereço cadastrado -->
                <?php if ($_SESSION['usuario']['id_localizacao'] == "0") { ?>
                    <!-- Botão para chamar o campo 'CEP' -->
                    <button class="btn btn-success btn-sm mb-3" onclick="mostrarCEP()" id="btnAddEndereco">Adicionar Endereço</button>

                    <p class="h4 text-center mt-3 mb-3" id="tituloEndereco" hidden>Informações de endereço</p>

                    <!-- Começo do FORM -->
                    <form action="actions/clientes/cadastrar_endereco_cliente.php" method="POST">
                        <div class="form-floating">
                            <!-- Input CEP que chama a função da API ViaCEP -->
                            <input class="form-control form-control-lg mb-2 w-25" type="number" placeholder="CEP" aria-label=".form-control-lg example" id="cep" name="cep" hidden onkeyup="document.getElementById('btn_limpar').hidden=false" onblur="pesquisacep(this.value)">
                            <label for="floatingInput" id="cepLabel" hidden>CEP</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Rua" aria-label=".form-control-lg example" id="rua" name="rua" hidden>
                            <label for="floatingInput" id="ruaLabel" hidden>Rua</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Complemento" aria-label=".form-control-lg example" id="complemento" name="complemento" hidden>
                            <label for="floatingInput" id="complementoLabel" hidden>Complemento</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Bairro" aria-label=".form-control-lg example" id="bairro" name="bairro" hidden>
                            <label for="floatingInput" id="bairroLabel" hidden>Bairro</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Cidade" aria-label=".form-control-lg example" id="cidade" name="cidade" hidden>
                            <label for="floatingInput" id="cidadeLabel" hidden>Cidade</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="UF" aria-label=".form-control-lg example" id="uf" name="uf" hidden>
                            <label for="floatingInput" id="ufLabel" hidden>UF</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="DDD" aria-label=".form-control-lg example" id="ddd" name="ddd" hidden>
                            <label for="floatingInput" id="dddLabel" hidden>DDD</label>
                        </div>

                        <input type="hidden" id=tipoLocal name=tipoLocal value="Residencial">

                        <!-- Botões -->
                        <div class="form-floating">
                            <div class="col d-flex">
                                <div class="justify-content-start">
                                    <!-- Botão para limpar todos os campos -->
                                    <button class="btn btn-warning my-3" id="btn_limpar" onclick="limpar_formulario_inteiro()" hidden>Limpar</button>
                                </div>
                                <div class="justify-content-end mx-3 mt-3">
                                    <!-- Botão para cadastrar o endereço e dar submit no formulário -->
                                    <button class="btn btn-success" type="submit" id="btn_cadastrar" hidden>Salvar Endereço</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Fim do form -->
                <?php } ?>

                <!-- Informações do endereço do usuario -->
                <?php if ($_SESSION['usuario']['id_localizacao'] !=  0) { ?>
                    <?php foreach ($infoLocal as $iL) { ?>
                        <p class="h4 text-center mt-3 mb-3">Informações de endereço</p>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-25" type="text" placeholder="CEP" aria-label=".form-control-lg example" value="<?= $iL['cep']; ?>">
                            <label for="floatingInput">CEP</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="UF" aria-label=".form-control-lg example" value="<?= $iL['uf']; ?>">
                            <label for="floatingInput">UF</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Bairro" aria-label=".form-control-lg example" value="<?= $iL['bairro']; ?>">
                            <label for="floatingInput">Bairro</label>
                        </div>

                        <div class="form-floating">
                            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Rua" aria-label=".form-control-lg example" value="<?= $iL['logradouro']; ?>">
                            <label for="floatingInput">Rua</label>
                        </div>

                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <?php
        include_once("includes/rodape.include.php");
        ?>

    </div>








    <!-- puxar js -->
    <script src="CSS_e_JS/script.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php include_once('includes/alertas.include.php'); ?>

    <script>
        function mostrarCEP() {
            document.getElementById('cep').hidden = false

            document.getElementById('cepLabel').hidden = false

            document.getElementById('btnAddEndereco').hidden = true
            document.getElementById('tituloEndereco').hidden = false
        }
    </script>

    <!-- Api ViaCEP -->
    <script>
        function mostrarCampos() {
            document.getElementById('rua').hidden = false;
            document.getElementById('complemento').hidden = false;
            document.getElementById('bairro').hidden = false;
            document.getElementById('cidade').hidden = false;
            document.getElementById('uf').hidden = false;
            document.getElementById('ddd').hidden = false;

            document.getElementById('cepLabel').hidden = false
            document.getElementById('ruaLabel').hidden = false
            document.getElementById('complementoLabel').hidden = false
            document.getElementById('bairroLabel').hidden = false
            document.getElementById('cidadeLabel').hidden = false
            document.getElementById('ufLabel').hidden = false
            document.getElementById('dddLabel').hidden = false

            document.getElementById('btn_limpar').hidden = false;
            document.getElementById('btn_cadastrar').hidden = false;
        }

        function esconderCampos() {
            document.getElementById('rua').hidden = true;
            document.getElementById('complemento').hidden = true;
            document.getElementById('bairro').hidden = true;
            document.getElementById('cidade').hidden = true;
            document.getElementById('uf').hidden = true;
            document.getElementById('ddd').hidden = true;

            document.getElementById('ruaLabel').hidden = true;
            document.getElementById('complementoLabel').hidden = true;
            document.getElementById('bairroLabel').hidden = true;
            document.getElementById('cidadeLabel').hidden = true;
            document.getElementById('ufLabel').hidden = true;
            document.getElementById('dddLabel').hidden = true;

            document.getElementById('btn_limpar').hidden = true;
            document.getElementById('btn_cadastrar').hidden = true;
        }

        function limpar_formulario_cep() {
            document.getElementById('rua').value = ("");
            document.getElementById('complemento').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
            document.getElementById('ddd').value = ("");

            esconderCampos();
        }

        function limpar_formulario_inteiro() {
            document.getElementById('cep').value = ("");
            document.getElementById('complemento').value = ("");
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
            document.getElementById('ddd').value = ("");

            esconderCampos();
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('complemento').value = (conteudo.complemento);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
                document.getElementById('ddd').value = (conteudo.ddd);

                mostrarCampos();
            } //end if.
            else {
                //CEP não Encontrado.
                limpar_formulario_cep();
                esconderCampos();
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = ("...");
                    document.getElementById('complemento').value = ("...");
                    document.getElementById('bairro').value = ("...");
                    document.getElementById('cidade').value = ("...");
                    document.getElementById('uf').value = ("...");
                    document.getElementById('ddd').value = ("...");

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                    mostrarCampos();

                } else {
                    //cep é inválido.
                    limpar_formulario_cep();
                    esconderCampos();
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpar_formulario_cep();
                esconderCampos();
            }
        };
    </script>

    <script>
        function mostrarInformacoesResultados() {
            // Desoculta a div do resultados
            document.getElementById('resultadoInfos').hidden = false

            // Oculta as outras divs
            document.getElementById('usuarioInfo').hidden = true
            document.getElementById('agendamentosInfo').hidden = true

            // Botões
            // Oculta o botão de resultados
            document.getElementById('btnResultados').hidden = true

            // Desoculta os outros botões
            document.getElementById('btnPerfil').hidden = false
            document.getElementById('btnAgendamentos').hidden = false
        }

        function mostrarInformacoesPerfil() {
            // Desoculta a div de informações do perfil
            document.getElementById('usuarioInfo').hidden = false

            // Oculta as outras divs
            document.getElementById('resultadoInfos').hidden = true
            document.getElementById('agendamentosInfo').hidden = true

            document.getElementById('btnPerfil').hidden = true

            document.getElementById('btnResultados').hidden = false
            document.getElementById('btnAgendamentos').hidden = false
        }

        function mostrarInformacoesAgendamento() {
            // Desoculta a div de agendamentos
            document.getElementById('agendamentosInfo').hidden = false

            // Oculta as outras divs
            document.getElementById('usuarioInfo').hidden = true
            document.getElementById('resultadoInfos').hidden = true


            document.getElementById('btnAgendamentos').hidden = true

            document.getElementById('btnPerfil').hidden = false;
            document.getElementById('btnResultados').hidden = false
        }
    </script>

    <script>
        function habilitarEdicao(){
            document.getElementById('btnEditarInfo').disabled=false
        }
    </script>



</body>