<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo 'Erro';
    die();
}

if(isset($_GET['id'])){
    require_once('../../classes/Localizacao.class.php');
    $localizacao = new Localizacao();
    // Obtendo o id da URL:
    $localizacao -> id = $_GET['id'];

    if($localizacao -> Deletar() == 1){

        header('Location: gerenciamento_enderecos.php?sucesso=removerlocalizacao');
    }else{
        header('Location: ../painel.php?falha=removerlocalizacao');
    }
}else{
    header('Location: ../painel.php?falha=removerlocalizacao');
}


?>