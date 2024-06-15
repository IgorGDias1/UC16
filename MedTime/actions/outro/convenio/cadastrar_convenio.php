<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require_once('../../../classes/Convenio.class.php');

        $c = new Convenio();

        $c->nome = strip_tags($_POST['convenio']);
        $c->email = strip_tags($_POST['email']);
        $c->telefone = strip_tags($_POST['telefone']);

        if ($c -> Cadastrar() == 1) {
            header('Location: ../gerenciamento_outro.php?sucesso=cadastrarconvenio');
        } else {
            header('Location: ../gerenciamento_outro.php?falha=cadastrarconvenio');
        }
    } else {
        header('Location: ../gerenciamento_outro.php?falha=cadastrarconvenio');
    }

?>