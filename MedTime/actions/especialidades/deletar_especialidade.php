<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo 'Erro';
    die();
}

if(isset($_GET['id'])){
    require_once('../../classes/Especialidade.class.php');
    $especialidade = new Especialidade();
    // Obtendo o id da URL:
    $especialidade -> id = $_GET['id'];

    if($especialidade -> Deletar() == 1){

        header('Location: ../outro/ger_especialidade_cargo.php?sucesso=removerespecialidade');
        die();
    }else{
        header('Location: ../outro/ger_especialidade_cargo.php?falha=removerespecialidade');
        die();
    }
}else{
    header('Location: ../outro/ger_especialidade_cargo.php?falha=post');
    die();
}


?>