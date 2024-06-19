<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Especialidade.class.php');

    $especialidade = new Especialidade();
    $especialidade -> id = strip_tags($_POST['id_especialidade']);
    $especialidade -> id_cargo = strip_tags($_POST['id_cargo']);
    $especialidade -> especificacao = strip_tags($_POST['especificacao']);

    if($especialidade->Editar() == 1){
        header('Location: ../outro/ger_especialidade_cargo.php?sucesso=editarespecialidade');
        die();
    }else{
        header('Location: ../outro/ger_especialidade_cargo.php?falha=editarespecialidade');
        die();
    }

}else{
    header('Location: ../outro/ger_especialidade_cargo.php?falha=post');
}


?>