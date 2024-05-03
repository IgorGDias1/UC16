<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo 'Erro';
    die();
}

if(isset($_GET['id'])){
    require_once('../../classes/Cliente.class.php');
    $c = new Cliente();
    // Obtendo o id da URL:
    $c -> id = $_GET['id'];

    if($c -> Deletar() == 1){

        header('Location: gerenciamento_clientes.php?sucesso=removercliente');
    }else{
        header('Location: ../painel.php?falha=removercliente');
    }
}else{
    header('Location: ../painel.php?falha=removercliente');
}


?>