<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['cepFuncionario'] != ""){
        require_once('../../classes/Localizacao.class.php');
        $localizacao = new Localizacao();
    
        $localizacao->cep = strip_tags($_POST['cepFuncionario']);
    
        // Verificando seo O CEP já está cadastrado
        $resultado = $localizacao->VerificarSeExiste();
    
        // Obtendo od ID do CEP
        foreach ($resultado as $r) {
            $idL = $r['id'];
        }
    
        // Verificando se o CEP já está cadastrado
        if (count($resultado) == 1) {
            require_once('../../classes/Usuario.class.php');
            $funcionario = new Usuario();
    
            $funcionario->nome = strip_tags($_POST['nomeFuncionario']);
            $funcionario->email = strip_tags($_POST['emailFuncionario']);
            $funcionario->senha = strip_tags($_POST['senhaFuncionario']);
            $funcionario->cpf = strip_tags($_POST['cpfFuncionario']);
            $funcionario->data_nascimento = strip_tags($_POST['data_nascimentoFuncionario']);
            $funcionario->telefone_celular = strip_tags($_POST['telefone_celularFuncionario']);
            $funcionario->telefone_residencial = strip_tags($_POST['telefone_residencialFuncionario']);
    
            // Atribuindo o ID do CEP ao usuário
            $funcionario->id_localizacao = $r['id'];
    
            $funcionario->id_convenio = strip_tags($_POST['id_convenioFuncionario']);
            $funcionario->id_cargo = strip_tags($_POST['id_cargoFuncionario']);

            if($_POST['id_especialidadeFuncionario'] == ""){
                $funcionario->id_especialidade = NULL;
            } else {
                $funcionario->id_especialidade = strip_tags($_POST['id_especialidadeFuncionario']);
            }

            $funcionario->situacao = "1";
    
            if ($funcionario->CadastrarFuncionario() == 1) {
                header('Location: ../clientes/gerenciamento_clientes.php?sucesso=cadastrarfuncionario');
                die();
            } else {
                header('Location: ../clientes/gerenciamento_clientes.php?falha=cadastrarfuncionario');
                die();
            }
        // Caso CEP não esteja cadastrado
        } else {
            require_once('../../classes/Usuario.class.php');
    
            $funcionario = new Usuario();
    
            $funcionario->nome = strip_tags($_POST['nomeFuncionario']);
            $funcionario->email = strip_tags($_POST['emailFuncionario']);
            $funcionario->senha = strip_tags($_POST['senhaFuncionario']);
            $funcionario->cpf = strip_tags($_POST['cpfFuncionario']);
            $funcionario->data_nascimento = strip_tags($_POST['data_nascimentoFuncionario']);
            $funcionario->telefone_celular = strip_tags($_POST['telefone_celularFuncionario']);
            $funcionario->telefone_residencial = strip_tags($_POST['telefone_residencialFuncionario']);
            $funcionario->id_convenio = strip_tags($_POST['id_convenioFuncionario']);
            $funcionario->id_cargo = strip_tags($_POST['id_cargoFuncionario']);
            $funcionario->situacao = "1";

            if($_POST['id_especialidadeFuncionario'] == ""){
                $funcionario->id_especialidade = NULL;
            } else {
                $funcionario->id_especialidade = strip_tags($_POST['id_especialidadeFuncionario']);
            }
    
            $funcionario->cep = strip_tags($_POST['cepFuncionario']);
            $funcionario->logradouro = strip_tags($_POST['ruaFuncionario']);
            $funcionario->complemento = strip_tags($_POST['complementoFuncionario']);
            $funcionario->bairro = strip_tags($_POST['bairroFuncionario']);
            $funcionario->localidade = strip_tags($_POST['cidadeFuncionario']);
            $funcionario->uf = strip_tags($_POST['ufFuncionario']);
            $funcionario->ddd = strip_tags($_POST['dddFuncionario']);
            $funcionario->tipoLocal = strip_tags($_POST['tipoLocalFuncionario']);
    
            if ($funcionario->CadastrarFuncionarioLocalizacao() == 1) {
                header('Location: ../clientes/gerenciamento_clientes.php?sucesso=cadastrarfuncionario');
                die();
            } else {
                header('Location: ../clientes/gerenciamento_clientes.php?falha=cadastrarfuncionario');
                die();
            }
        }
    }
} else {
    header('Location: ../clientes/gerenciamento_clientes.php?falha=cadastrarfuncionario');
    die();
}
