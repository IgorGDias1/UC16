<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Caso o campo cep esteja vazio -> executar um cadastrar sem endereço
    if($_POST['cep'] === ''){
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

    // CEP != '' -> cadastrando um usuario com endereço
    } else {
        require_once ('../../classes/Localizacao.class.php');
        $localizacao = new Localizacao();

        $localizacao -> cep = strip_tags($_POST['cep']);

        // Verificando seo O CEP já está cadastrado
        $resultado = $localizacao -> VerificarSeExiste();

        // Obtendo od ID do CEP
        foreach($resultado as $r){
            $idL = $r['id'];
        }

        // Verificando se o CEP já está cadastrado
        if(count($resultado) == 1){
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
            // Atribuindo o ID do CEP ao usuário
            $cliente -> id_localizacao = $r['id'];
            $cliente -> tipo = strip_tags($_POST['tipo']);

            if($cliente -> Cadastrar() == 1){
                header('Location: gerenciamento_clientes.php?sucesso=cadastrarcliente');
            
            }else{
                header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
            }
        // Caso CEP não esteja cadastrado
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
        
            $cliente -> cep = strip_tags($_POST['cep']);
            $cliente -> logradouro = strip_tags($_POST['rua']);
            $cliente -> complemento = strip_tags($_POST['complemento']);
            $cliente -> bairro = strip_tags($_POST['bairro']);
            $cliente -> localidade = strip_tags($_POST['cidade']);
            $cliente -> uf = strip_tags($_POST['uf']);
            $cliente -> ddd = strip_tags($_POST['ddd']);
            $cliente -> tipoLocal = strip_tags($_POST['tipoLocal']);
        
            if($cliente -> CadastrarUsuarioLocalizacao() == 1){
                header('Location: gerenciamento_clientes.php?sucesso=cadastrarcliente');
            
            }else{
                header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
            }
        }
    }

}else{
    header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
}


?>