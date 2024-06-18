<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Suporte.class.php');

    $suporte = new Suporte();
    $suporte->id_cliente = $_POST['id_cliente'];
    $suporte->assunto = $_POST['assunto'];
    $suporte->mensagem = $_POST['feedback'];
    $suporte->situacao = 1;

    if($suporte->Cadastrar() == 1){
        header('Location: ../../contate_nos.php?sucesso=cadastrarsuporte');
        die();
    }else{
        header('Location: ../../contate_nos.php?falha=cadastrarsuporte');
        die();
    }

}else{
    header('Location: ../../contate_nos.php?falha=cadastrarsuporte');
    die();
}

?>