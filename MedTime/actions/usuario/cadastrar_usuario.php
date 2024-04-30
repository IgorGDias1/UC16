<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Usuario.class.php');
    require_once('../../classes/Telefone.class.php');

    $usuario = new Usuario();
    $usuario -> nome = $_POST['nome'];
    $usuario -> email = $_POST['email'];
    $usuario -> senha = $_POST['senha'];
    $usuario -> cpf = $_POST['cpf'];
    $usuario -> data_nascimento = $_POST['data_nascimento'];
    $usuario -> id_categoria = 1;


    if($usuario -> Cadastrar() == 1){
        header('Location: ../../paginainicial.htm?sucesso=cadastrarusuario');

        $telefone = new Telefone();
        $telefone -> telefone = $_POST['telefone'];
        $telefone -> id_usuario = $usuario['id'];
        $telefone -> Cadastrar();

        if($_POST['telefone2'] != ""){
            $telefone -> telefone = $_POST['telefone2'];
            $telefone -> id_usuario = $usuario['id'];
            $telefone -> Cadastrar();
        }

    }else{
        header('Location: ../../paginainicial.htm?falha=cadastrarusuario');
    }

}else{
    header('Location: ../../paginainicial.htm?falha=post');
}

?>