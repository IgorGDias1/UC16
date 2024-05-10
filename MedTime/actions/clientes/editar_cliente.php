<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Cliente.class.php');

    $cliente = new Cliente();
    $cliente -> id = strip_tags($_POST['id']);

    $cliente -> nome = strip_tags($_POST['nome']);
    $cliente -> email = strip_tags($_POST['email']);
    $cliente -> cpf = strip_tags($_POST['cpf']);
    $cliente -> data_nascimento = strip_tags($_POST['data_nascimento']);
    $cliente -> telefone_celular = strip_tags($_POST['telefone_celular']);
    $cliente -> telefone_residencial = strip_tags($_POST['telefone_residencial']);
    $cliente -> id_convenio = strip_tags($_POST['id_convenio']);
    $cliente -> tipo = strip_tags($_POST['tipo']);

    if($cliente->Editar() == 1){
        header('Location: gerenciamento_clientes.php?sucesso=editarcliente');
    }else{
        header('Location: gerenciamento_clientes.php?falha=editarcliente');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}


?>