<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require_once('../../classes/Agendamento.class.php');

        $agendamento = new Agendamento();

        $agendamento->id_cliente = strip_tags($_POST['id_cliente']);
        $agendamento->id_funcionario = strip_tags($_POST['id_funcionario']);
        $agendamento->id_exame = strip_tags($_POST['id_exame']);
        $agendamento->id_convenio = strip_tags($_POST['id_convenio']);
        $agendamento->id_localizacao = strip_tags($_POST['clinica']);
        $agendamento->data_agendado = strip_tags($_POST['dataagendamento']);
        $agendamento->situacao = 1;

        if ($agendamento -> Agendar() == 1) {
            header('Location: ../../Consultas.php?sucesso=cadastraragendamento');
        } else {
            header('Location: ../../Consultas.php?falha=cadastraragendamento');
        }
    } else {
        header('Location: ../../Consultas.php?falha=cadastraragendamento');
    }

?>
