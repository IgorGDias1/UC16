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
        die();
    }else{
        header('Location: gerenciamento_enderecos.php?falha=removerlocalizacao');
        die();
    }
}else{
    header('Location: gerenciamento_enderecos.php?falha=removerlocalizacao');
    die();
}


?>