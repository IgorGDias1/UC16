<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../../classes/Exame.class.php');

    $exame = new Exame();
    $exame->nome = $_POST['exame'];
    $exame->id_responsavel = $_POST['responsavel'];

    if($exame->Cadastrar() == 1){
        header('Location: ../gerenciamento_outro.php?sucesso=cadastrarexame');
        die();

    }else{
        header('Location: ../gerenciamento_outro.php?falha=cadastrarexame');
        die();
    }

}else{
    header('Location: ../gerenciamento_outro.php?falha=post');
    die();
}

?>