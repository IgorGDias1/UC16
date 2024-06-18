<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo 'Erro';
    die();
}

if(isset($_GET['id'])){
    require_once('../../../classes/Convenio.class.php');
    $c = new Convenio();
    // Obtendo o id da URL:
    $c -> id = $_GET['id'];

    if($c -> Deletar() == 1){

        header('Location: ../gerenciamento_outro.php?sucesso=removerconvenio');
        die();
    }else{
        header('Location: ../gerenciamento_outro.php?falha=removerconvenio');
        die();
    }
}else{
    header('Location: ../gerenciamento_outro.php?falha=post');
    die();
}


?>