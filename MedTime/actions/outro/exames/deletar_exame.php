<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo 'Erro';
    die();
}

if(isset($_GET['id'])){
    require_once('../../../classes/Exame.class.php');
    $exame = new Exame();
    // Obtendo o id da URL:
    $exame -> id = $_GET['id'];

    if($exame -> Deletar() == 1){

        header('Location: ../ger_exames.php?sucesso=deletarexame');
        die();
    }else{
        header('Location: ../ger_exames.php?falha=deletarexame');
        die();
    }
}else{
    header('Location: ../ger_exames.php?falha=post');
    die();
}


?>