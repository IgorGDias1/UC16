<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ../login/validar_login.php?falha=removercliente');
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Usuario.class.php');

    $usuario = new Usuario();
    $usuario->id = strip_tags($_POST['id_funcionarioEdi']);

    $usuario->nome = strip_tags($_POST['nomeFuncionarioEdi']);
    $usuario->email = strip_tags($_POST['emailFuncionarioEdi']);
    $usuario->cpf = strip_tags($_POST['cpfFuncionarioEdi']);
    $usuario->data_nascimento = strip_tags($_POST['data_nascimentoFuncionarioEdi']);
    $usuario->telefone_celular = strip_tags($_POST['telefone_celularFuncionarioEdi']);
    $usuario->telefone_residencial = strip_tags($_POST['telefone_residencialFuncionarioEdi']);
    $usuario->id_convenio = strip_tags($_POST['id_convenioFuncionarioEdi']);
    $usuario->id_cargo = strip_tags($_POST['id_cargoFuncionarioEdi']);

    if($_POST['id_especialidade'] == "") {
        $usuario->id_especialidade = NULL;
    } else {
        $usuario->id_especialidade = strip_tags($_POST['id_especialidadeEdi']);
    }


    if($_POST['situacaoFuncionarioEdi'] == "Ativo"){
        $usuario->situacao = 1;
    } else {
        $usuario->situacao = 0;
    }

    if($usuario->EditarFuncionario() == 1){
        header('Location: ../clientes/gerenciamento_clientes.php?sucesso=editarcliente');
    }else{
        header('Location: ../clientes/gerenciamento_clientes.php?falha=editarcliente');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}


?>