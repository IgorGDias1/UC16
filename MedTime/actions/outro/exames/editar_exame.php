<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Exame.class.php');

    $exame = new Exame();
    $exame -> id = strip_tags($_POST['id']);
    $exame -> nome = strip_tags($_POST['nome']);
    $exame -> id_responsavel = strip_tags($_POST['id_resp']);

    if($exame->Editar() == 1){
        header('Location: gerenciamento_enderecos.php?sucesso=editarexame');
        die();
    }else{
        header('Location: gerenciamento_enderecos.php?falha=editarexame');
        die();
    }

}else{  
    header('Location: gerenciamento_enderecos.php?falha=post');
    die();
}


?>