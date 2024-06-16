<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    require_once('../../classes/Suporte.class.php');

    $suporte = new Suporte();
    $suporte->id = $_GET['id'];
    $suporte->situacao = 0;

    if($suporte->Modificar_Situacao() == 1){
        header('Location: gerenciamento_suporte.php?sucesso=cadastrarsuporte');
    }else{
        header('Location: gerenciamento_suporte.php?falha=cadastrarsuporte');
    }

}else{
    header('Location: gerenciamento_suporte.php?falha=cadastrarsuporte');
}

?>