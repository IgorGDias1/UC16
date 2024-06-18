<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Convenio.class.php');

    $c = new Convenio();
    $c -> id = strip_tags($_POST['id']);
    $c -> nome = strip_tags($_POST['nome']);
    $c -> email = strip_tags($_POST['email']);
    $c -> telefone = strip_tags($_POST['telefone']);

    if($exame->Editar() == 1){
        header('Location: ../gerenciamento_outro.php?sucesso=editarconvenio');
        die();
    }else{
        header('Location: ../gerenciamento_outro.php?falha=editarconvenio');
        die();
    }

}else{  
    header('Location: ../gerenciamento_outro.php?falha=post');
    die();
}


?>