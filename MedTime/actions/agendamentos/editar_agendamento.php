<?php

session_start();
if(!isset($_SESSION['agendamento'])){
    header('Location: ../login/validar_login.php?falha=removercliente');
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Agendamento.class.php');
    
    $agendamento = new Agendamento();
    $agendamento->id = strip_tags($_POST['id']);
    $agendamento->id_cliente = strip_tags($_POST['id_paciente']);
    $agendamento->id_funcionario = strip_tags($_POST['id_medico']);
    $agendamento->id_exame = strip_tags($_POST['id_exame']);
    $agendamento->id_convenio = strip_tags($_POST['id_convenio']);
    $agendamento->id_localizacao = strip_tags($_POST['']);
    $agendamento->data_agendado = strip_tags($_POST['data_consulta']);

    

    if($agendamento->Editar() == 1){
        header('Location: gerenciamento_clientes.php?sucesso=editarcliente');
    }else{
        header('Location: gerenciamento_clientes.php?falha=editarcliente');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}


?>