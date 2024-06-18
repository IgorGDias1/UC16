<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo 'Erro';
    die();
}

if(isset($_GET['id'])){
    require_once('../../classes/Cargos.class.php');
    $cargo = new Cargos();
    // Obtendo o id da URL:
    $cargo -> id = $_GET['id'];

    if($cargo -> Deletar() == 1){

        header('Location: ../outro/gerenciamento_outro.php?sucesso=removercargo');
        die();
    }else{
        header('Location: ../outro/gerenciamento_outro.php?falha=removercargo');
        die();
    }
}else{
    header('Location: ../outro/gerenciamento_outro.php?falha=post');
    die();
}


?>