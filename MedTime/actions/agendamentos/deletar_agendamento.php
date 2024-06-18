<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: ../login/validar_login.php?falha=removercliente');
    die();
}

if(isset($_GET['id'])){
    require_once('../../classes/Agendamento.class.php');
    $agendamento = new Agendamento();
    // Obtendo o id da URL:
    $agendamento->id = $_GET['id'];

    if($agendamento->Deletar() == 1){

        header('Location: gerenciamento_agendamentos.php?sucesso=removeragendamento');
        die();
    }else{
        header('Location: gerenciamento_agendamentos.php?falha=removeragendamento');
        die();
    }
}else{
    header('Location: gerenciamento_agendamentos.php?falha=removeragendamento');
    die();
}


?>