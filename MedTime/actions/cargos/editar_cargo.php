<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Cargos.class.php');

    $cargo = new Cargos();
    $cargo -> id = strip_tags($_POST['id']);
    $cargo -> nome = strip_tags($_POST['nome']);

    if($cargo->Editar() == 1){
        header('Location: ../outro/ger_especialidade_cargo.php?sucesso=editarcargo');
        die();
    }else{
        header('Location: ../outro/ger_especialidade_cargo.php?falha=editarcargo');
        die();
    }

}else{
    header('Location: ../outro/ger_especialidade_cargo.php?falha=post');
}


?>