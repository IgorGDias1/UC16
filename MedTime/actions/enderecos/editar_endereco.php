<?php

session_start();
if(!isset($_SESSION['usuario'])){
    echo "Falha";
    die();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Localizacao.class.php');

    $localizacao = new Localizacao();
    $localizacao -> id = strip_tags($_POST['id']);
    $localizacao -> cep = strip_tags($_POST['cep']);
    $localizacao -> logradouro = strip_tags($_POST['logradouro']);
    $localizacao -> complemento = strip_tags($_POST['complemento']);
    $localizacao -> bairro = strip_tags($_POST['bairro']);
    $localizacao -> localidade = strip_tags($_POST['localidade']);
    $localizacao -> uf = strip_tags($_POST['uf']);
    $localizacao -> ddd = strip_tags($_POST['ddd']);
    $localizacao -> tipo = strip_tags($_POST['tipo']);

    if($localizacao->Editar() == 1){
        header('Location: gerenciamento_enderecos.php?sucesso=editarlocalizacao');
        die();
    }else{
        header('Location: gerenciamento_enderecos.php?falha=editarlocalizacao');
        die();
    }

}else{
    echo 'Erro. A página deve ser carregada por POST';
    die();
}


?>