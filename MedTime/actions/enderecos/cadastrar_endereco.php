<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../../classes/Localizacao.class.php');

    $localizacao = new localizacao();
    $localizacao -> cep = strip_tags($_POST['cep']);
    $localizacao -> logradouro = strip_tags($_POST['rua']);
    $localizacao -> complemento = strip_tags($_POST['complemento']);
    $localizacao -> bairro = strip_tags($_POST['bairro']);
    $localizacao -> localidade = strip_tags($_POST['cidade']);
    $localizacao -> uf = strip_tags($_POST['uf']);
    $localizacao -> ddd = strip_tags($_POST['ddd']);
    $localizacao -> tipo = strip_tags($_POST['tipoLocal']);

    if($localizacao -> Cadastrar() == 1){
        header('Location: gerenciamento_enderecos.php?sucesso=cadastrarlocalizacao');
    }else{
        header('Location: gerenciamento_enderecos.php?falha=cadastrarlocalizacao');
    }

}else{
    header('Location: gerenciamento_enderecos.php?falha=cadastrarlocalizacao');
}


?>