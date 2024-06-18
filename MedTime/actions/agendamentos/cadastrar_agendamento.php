<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require_once('../../classes/Agendamento.class.php');

        $agendamento = new Agendamento();

        $agendamento->id_cliente = strip_tags($_POST['paciente']);
        $agendamento->id_funcionario = strip_tags($_POST['medico']);
        $agendamento->id_exame = strip_tags($_POST['exame']);
        $agendamento->id_convenio = strip_tags($_POST['convenio']);
        $agendamento->id_localizacao = strip_tags($_POST['clinica']);
        $agendamento->data_agendado = strip_tags($_POST['data_consulta']);
        $agendamento->situacao = 1;

        if ($agendamento -> Agendar() == 1) {
            header('Location: gerenciamento_agendamentos.php?sucesso=agendar');
            die();
        } else {
            header('Location: gerenciamento_agendamentos.php?falha=agendar');
            die();
        }
    } else {
        header('Location: gerenciamento_agendamentos.php?falha=agendar');
        die();
    }

?>
