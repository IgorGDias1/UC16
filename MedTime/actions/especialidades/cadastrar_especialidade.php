<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Especialidade.class.php');

    $especialidade = new Especialidade();
    $especialidade->id_cargo = $_POST['id_cargo'];
    $especialidade->especificacao = $_POST['especialidade'];

    if($especialidade->Cadastrar() == 1){
        header('Location: ../clientes/gerenciamento_clientes.php?sucesso=cadastrarespecialidade');

    }else{
        header('Location: .../clientes/gerenciamento_clientes.php?falha=cadastrarespecialidade');
    }

}else{
    header('Location: .../clientes/gerenciamento_clientes.php?falha=cadastrarespecialidade');
}

?>