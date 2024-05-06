<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Cliente.class.php');

    $cliente = new cliente();

    $cliente -> nome = strip_tags($_POST['nome']);
    $cliente -> email = strip_tags($_POST['email']);
    $cliente -> senha = strip_tags($_POST['senha']);
    $cliente -> cpf = strip_tags($_POST['cpf']);
    $cliente -> data_nascimento = strip_tags($_POST['data_nascimento']);
    $cliente -> telefone_celular = strip_tags($_POST['telefone_celular']);
    $cliente -> telefone_residencial = strip_tags($_POST['telefone_residencial']);
    $cliente -> id_localizacao = strip_tags($_POST['id_localizacao']);
    $cliente -> id_convenio = strip_tags($_POST['id_convenio']);
    $cliente -> tipo = strip_tags($_POST['tipo']);


    if($cliente -> Cadastrar() == 1){
        header('Location: gerenciamento_clientes.php?sucesso=cadastrarcliente');

    }else{
        header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
    }

}else{
    header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
}


?>