<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_GET['cep'] != ''){
        require_once('../../classes/Cliente.class.php');

        $cliente = new cliente();
    
        $cliente -> cep = strip_tags($_POST['cep']);
        $cliente -> logradouro = strip_tags($_POST['rua']);
        $cliente -> complemento = strip_tags($_POST['complemento']);
        $cliente -> bairro = strip_tags($_POST['bairro']);
        $cliente -> localidade = strip_tags($_POST['cidade']);
        $cliente -> uf = strip_tags($_POST['uf']);
        $cliente -> ddd = strip_tags($_POST['ddd']);
        $cliente -> tipoLocal = strip_tags($_POST['tipoLocal']);
    
        $cliente -> nome = strip_tags($_POST['nome']);
        $cliente -> email = strip_tags($_POST['email']);
        $cliente -> senha = strip_tags($_POST['senha']);
        $cliente -> cpf = strip_tags($_POST['cpf']);
        $cliente -> data_nascimento = strip_tags($_POST['data_nascimento']);
        $cliente -> telefone_celular = strip_tags($_POST['telefone_celular']);
        $cliente -> telefone_residencial = strip_tags($_POST['telefone_residencial']);
        $cliente -> id_convenio = strip_tags($_POST['id_convenio']);
        $cliente -> tipo = strip_tags($_POST['tipo']);
    
        if($cliente -> Teste() == 1){
            header('Location: gerenciamento_clientes.php?sucesso=cadastrarcliente');
    
        }else{
            header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
        }
    } else {
        require_once('../../classes/Cliente.class.php');

        $cliente = new cliente();
        $cliente -> nome = strip_tags($_POST['nome']);
        $cliente -> email = strip_tags($_POST['email']);
        $cliente -> senha = strip_tags($_POST['senha']);
        $cliente -> cpf = strip_tags($_POST['cpf']);
        $cliente -> data_nascimento = strip_tags($_POST['data_nascimento']);
        $cliente -> telefone_celular = strip_tags($_POST['telefone_celular']);
        $cliente -> telefone_residencial = strip_tags($_POST['telefone_residencial']);
        $cliente -> id_convenio = strip_tags($_POST['id_convenio']);
        $cliente -> tipo = strip_tags($_POST['tipo']);

        if($cliente -> Cadastrar() == 1){
            header('Location: gerenciamento_clientes.php?sucesso=cadastrarcliente');
    
        }else{
            header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
        }
    }

}else{
    header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
}


?>