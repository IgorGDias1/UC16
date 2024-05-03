<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Cliente.class.php');

    $c = new Cliente();
    $c -> id = strip_tags($_POST['id']);
    $c -> nome = strip_tags($_POST['nome']);
    $c -> email = strip_tags($_POST['email']);
    $c -> cpf = strip_tags($_POST['cpf']);
    $c -> data_nascimento = strip_tags($_POST['data_nascimento']);
    $c -> telefone_celular = strip_tags($_POST['telefone_celular']);
    $c -> telefone_residencial = strip_tags($_POST['telefone_residencial']);
    $c -> id_localizacao = strip_tags($_POST['id_localizacao']);
    $c -> id_convenio = strip_tags($_POST['id_convenio']);
    $c -> tipo = strip_tags($_POST['tipo']);

    if($c->Editar() == 1){
        header('Location: gerenciamento_clientes.php?sucesso=editarc');
    }else{
        header('Location: gerenciamento_clientes.php?falha=editarc');
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
}


?>