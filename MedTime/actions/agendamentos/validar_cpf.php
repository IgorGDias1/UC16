<?php

session_start();
if(!isset($_SESSION['agendamento'])){
    header('Location: ../login/validar_login.php?falha=removercliente');
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Usuario.class.php');
    
    $u = new Usuario();
    $u->cpf = strip_tags($_POST['cpf']);
    

    if($u->ListarPorCPF() == 1){
        header('Location: gerenciamento_agendamentos.php?sucesso=validarcpf');
    }else{
        header('Location: gerenciamento_agendamentos.php?falha=validarcpf');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}

?>