<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Especialidade.class.php');

    $especialidade = new Especialidade();
    $especialidade -> id = strip_tags($_POST['id']);
    $especialidade -> id_cargo = strip_tags($_POST['id_cargo']);
    $especialidade -> especificacao = strip_tags($_POST['especificacao']);

    if($especialidade->Editar() == 1){
        header('Location: ../outro/gerenciamento_outro.php?sucesso=editarespecialidade');
    }else{
        header('Location: ../outro/gerenciamento_outro.php?falha=editarespecialidade');
    }

}else{
    header('Location: ../outro/gerenciamento_outro.php?falha=post');
}


?>