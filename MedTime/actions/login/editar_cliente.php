<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ../../paginainicial.php?falha=editarusuario');
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Usuario.class.php');

    $usuario = new Usuario();
    $usuario->id = strip_tags($_POST['idCliente']);

    $usuario->nome = strip_tags($_POST['nomeCliente']);
    $usuario->email = strip_tags($_POST['emailCliente']);
    $usuario->cpf = strip_tags($_POST['cpfCliente']);
    $usuario->data_nascimento = strip_tags($_POST['data_nasciCliente']);
    $usuario->telefone_celular = strip_tags($_POST['telefone_celCliente']);
    $usuario->telefone_residencial = strip_tags($_POST['telefone_resCliente']);

    $usuario->id_convenio = strip_tags($_POST['id_convenio']);

    if($usuario->EditarUsuario() == 1){
        header('Location: ../../perfil.php?sucesso=editarusuario');
        die();
    }else{
        header('Location: ../../perfil.php?falha=editarusuario');
        die();
    }

}else{
    header('Location: ../../perfil.php?falha=post');
    die();
}


?>