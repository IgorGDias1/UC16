<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ../login/validar_login.php?falha=removercliente');
    die();
}

if(isset($_GET['id'])){
    require_once('../../classes/Usuario.class.php');
    $usuario = new Usuario();
    // Obtendo o id da URL:
    $usuario->id = $_GET['id'];

    if($c->Deletar() == 1){

        header('Location: gerenciamento_clientes.php?sucesso=removercliente');
    }else{
        header('Location: gerenciamento_clientes.php?falha=removercliente');
    }
}else{
    header('Location: gerenciamento_clientes.php?falha=removercliente');
}


?>