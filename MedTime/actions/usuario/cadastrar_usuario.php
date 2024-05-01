<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Usuario.class.php');

    $usuario = new Usuario();
    $usuario -> nome = strip_tags($_POST['nome']);
    $usuario -> email = strip_tags($_POST['email']);
    $usuario -> senha = strip_tags($_POST['senha']);
    $usuario -> telefone = strip_tags($_POST['telefone']);
    $usuario -> cpf = strip_tags($_POST['cpf']);
    $usuario -> data_nascimento = strip_tags($_POST['data_nascimento']);
    $usuario -> id_categoria = 1;

    if($usuario -> Cadastrar() == 1){
        header('Location: ../../paginainicial.htm?sucesso=cadastrarusuario');

    }else{
        header('Location: ../../paginainicial.htm?falha=cadastrarusuario');
    }

}else{
    header('Location: ../../paginainicial.htm?falha=post');
}


?>