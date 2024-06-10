<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo 'Erro';
    die();
}

if(isset($_GET['id'])){
    require_once('../../classes/Exame.class.php');
    $exame = new Exame();
    // Obtendo o id da URL:
    $exame -> id = $_GET['id'];

    if($exame -> Deletar() == 1){

        header('Location: ../outro/gerenciamento_outro.php?sucesso=removerexame');
    }else{
        header('Location: ../outro/gerenciamento_outro.php?falha=removerexame');
    }
}else{
    header('Location: ../outro/gerenciamento_outro.php?falha=post');
}


?>