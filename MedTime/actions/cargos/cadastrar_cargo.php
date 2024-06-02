<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Cargos.class.php');

    $cargo = new Cargos();
    $cargo->nome = $_POST['cargo'];

    if($cargo->Cadastrar() == 1){
        header('Location: ../clientes/gerenciamento_clientes.php?sucesso=cadastrarcargo');

    }else{
        header('Location: .../clientes/gerenciamento_clientes.php?falha=cadastrarcargo');
    }

}else{
    header('Location: .../clientes/gerenciamento_clientes.php?falha=cadastrarcargo');
}

?>