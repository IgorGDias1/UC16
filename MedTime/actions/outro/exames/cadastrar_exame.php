<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../../classes/Exame.class.php');

    $exame = new Exame();
    $exame->nome = $_POST['exame'];
    $exame->id_responsavel = $_POST['responsavel'];

    if($exame->Cadastrar() == 1){
        header('Location: ../ger_exames.php?sucesso=cadastrarexame');
        die();

    }else{
        header('Location: ../ger_exames.php?falha=cadastrarexame');
        die();
    }

}else{
    header('Location: ../ger_exames.php?falha=post');
    die();
}

?>