<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Exame.class.php');

    $exame = new Exame();
    $exame->nome = $_POST['nome'];
    $exame->id_responsavel = $_POST['id_resp'];

    if($exame->Cadastrar() == 1){
        header('Location: ../outro/gerenciamento_outro.php?sucesso=cadastrarexame');

    }else{
        header('Location: .../clientes/gerenciamento_outro.php?falha=cadastrarexame');
    }

}else{
    header('Location: .../clientes/gerenciamento_outro.php?falha=post');
}

?>