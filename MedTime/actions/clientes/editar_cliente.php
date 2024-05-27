<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ../login/validar_login.php?falha=removercliente');
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Usuario.class.php');

    $usuario = new Usuario();
    $usuario->id = strip_tags($_POST['id']);

    $usuario->nome = strip_tags($_POST['nome']);
    $usuario->email = strip_tags($_POST['email']);
    $usuario->cpf = strip_tags($_POST['cpf']);
    $usuario->data_nascimento = strip_tags($_POST['data_nascimento']);
    $usuario->telefone_celular = strip_tags($_POST['telefone_celular']);
    $usuario->telefone_residencial = strip_tags($_POST['telefone_residencial']);
    $usuario->id_convenio = strip_tags($_POST['id_convenio']);

    if($usuario->EditarUsuario() == 1){
        header('Location: gerenciamento_clientes.php?sucesso=editarcliente');
    }else{
        header('Location: gerenciamento_clientes.php?falha=editarcliente');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}


?>