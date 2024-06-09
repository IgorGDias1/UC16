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

    $agendamento->situacao = 0;

    if($agendamento->FinalizarAgendamento() == 1){

        header('Location: atendimento.php?sucesso=finalizaratendimento');
    }else{
        header('Location: gerenciamento_clientes.php?falha=finalizaratendimento');
    }
}else{
    header('Location: gerenciamento_clientes.php?falha=finalizaratendimento');
}


?>