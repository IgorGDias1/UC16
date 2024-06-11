<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ../login/validar_login.php?falha=editarcliente');
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Usuario.class.php');

    $usuario = new Usuario();
    $usuario->id = strip_tags($_POST['id_ClienteEdi']);

    $usuario->nome = strip_tags($_POST['nomeClienteEdi']);
    $usuario->email = strip_tags($_POST['emailClienteEdi']);
    $usuario->cpf = strip_tags($_POST['cpfClienteEdi']);
    $usuario->data_nascimento = strip_tags($_POST['data_nasciClienteEdi']);
    $usuario->telefone_celular = strip_tags($_POST['telefone_celClienteEdi']);
    $usuario->telefone_residencial = strip_tags($_POST['telefone_resClienteEdi']);
    $usuario->id_convenio = strip_tags($_POST['id_convenioClienteEdi']);

    if($usuario->EditarUsuario() == 1){
        header('Location: gerenciamento_clientes.php?sucesso=editarcliente');
    }else{
        header('Location: gerenciamento_clientes.php?falha=editarcliente');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}


?>