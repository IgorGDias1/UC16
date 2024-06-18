<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: ../login/validar_login.php?falha=removercliente');
        die();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('../../classes/Agendamento.class.php');
        
        $agendamento = new Agendamento();
        $agendamento->id = strip_tags($_POST['id']);
        
        $agendamento->id_cliente = strip_tags($_POST['id_paciente']); 
        $agendamento->id_funcionario = strip_tags($_POST['medicoEdit']);
        $agendamento->id_exame = strip_tags($_POST['exameEdit']);
        $agendamento->id_convenio = strip_tags($_POST['convenioEdit']);
        $agendamento->id_localizacao = strip_tags($_POST['enderecoEdit']);
        $agendamento->data_agendado = strip_tags($_POST['data_consultaEdit']);
        $agendamento->situacao = strip_tags($_POST['situacaoEdit']);
        

        if($agendamento->Editar() == 1){
            header('Location: gerenciamento_agendamentos.php?sucesso=editaragendamento');
            die();
        }else{
            header('Location: gerenciamento_agendamentos.php?falha=editaragendamento');
            die();
        }

    }else{
        header('Location: gerenciamento_agendamentos.php?falha=post');
        die();
    }


?>