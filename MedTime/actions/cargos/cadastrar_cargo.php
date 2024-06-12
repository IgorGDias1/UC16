<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Cargos.class.php');

    $cargo = new Cargos();
    $cargo->nome = $_POST['nome'];

    if($cargo->Cadastrar() == 1){
        echo 'SUCESSO';

    }else{
        echo 'FALHA';
    }

}else{
    echo 'FALHAPOST';
}

?>