<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require_once('../../classes/Agendamento.class.php');

        $agendamento = new Agendamento();

        date_default_timezone_set('America/Sao_Paulo');

        $date = date('Y-m-d H:i', strtotime(strip_tags($_POST['dataagendamento'])));

        $agendamento->id_cliente = strip_tags($_POST['id_cliente']);
        $agendamento->id_funcionario = strip_tags($_POST['id_funcionario']);
        $agendamento->id_exame = strip_tags($_POST['id_exame']);
        $agendamento->id_convenio = strip_tags($_POST['id_convenio']);
        $agendamento->id_localizacao = strip_tags($_POST['clinica']);
        $agendamento->data_agendado = $date;
        $agendamento->situacao = 1;

        if ($agendamento -> Agendar() == 1) {
            header('Location: ../../Consultas.php?sucesso=cadastraragendamento');
            die();
        } else {
            header('Location: ../../Consultas.php?falha=cadastraragendamento');
            die();
        }
    } else {
        header('Location: ../../Consultas.php?falha=cadastraragendamento');
        die();
    }

?>
