<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Caso o campo cep esteja vazio -> executar um cadastrar sem endereço
    if($_POST['cep'] === ''){
        require_once('../../classes/Usuario.class.php');

        $usuario = new Usuario();    
    
        $usuario->nome = strip_tags($_POST['nome']);
        $usuario->email = strip_tags($_POST['email']);
        $usuario->senha = strip_tags($_POST['senha']);
        $usuario->cpf = strip_tags($_POST['cpf']);
        $usuario->data_nascimento = strip_tags($_POST['data_nascimento']);
        $usuario->telefone_celular = strip_tags($_POST['telefone_celular']);
        $usuario->telefone_residencial = strip_tags($_POST['telefone_residencial']);
        $usuario->id_convenio = strip_tags($_POST['id_convenio']);


        if($usuario -> CadastrarClienteSemLocalizacao() == 1){
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
        $resultado = $localizacao->VerificarSeExiste();

        // Obtendo od ID do CEP
        foreach($resultado as $r){
            $idL = $r['id'];
        }

        // Verificando se o CEP já está cadastrado
        if(count($resultado) == 1){
            require_once('../../classes/Usuario.class.php');
            $usuario = new Usuario();    
    
            $usuario->nome = strip_tags($_POST['nome']);
            $usuario->email = strip_tags($_POST['email']);
            $usuario->senha = strip_tags($_POST['senha']);
            $usuario->cpf = strip_tags($_POST['cpf']);
            $usuario->data_nascimento = strip_tags($_POST['data_nascimento']);
            $usuario->telefone_celular = strip_tags($_POST['telefone_celular']);
            $usuario->telefone_residencial = strip_tags($_POST['telefone_residencial']);
            $usuario->id_convenio = strip_tags($_POST['id_convenio']);
            // Atribuindo o ID do CEP ao usuário
            $usuario->id_localizacao = $r['id'];

            if($usuario -> CadastrarClienteSemLocalizacao() == 1){
                header('Location: gerenciamento_clientes.php?sucesso=cadastrarcliente');
            
            }else{
                header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
            }
        // Caso CEP não esteja cadastrado -> cadastrar usuario e localizacao
        } else {
            require_once('../../classes/Usuario.class.php');

            $usuario = new Usuario();
        
            $usuario -> nome = strip_tags($_POST['nome']);
            $usuario -> email = strip_tags($_POST['email']);
            $usuario -> senha = strip_tags($_POST['senha']);
            $usuario -> cpf = strip_tags($_POST['cpf']);
            $usuario -> data_nascimento = strip_tags($_POST['data_nascimento']);
            $usuario -> telefone_celular = strip_tags($_POST['telefone_celular']);
            $usuario -> telefone_residencial = strip_tags($_POST['telefone_residencial']);
            $usuario -> id_convenio = strip_tags($_POST['id_convenio']);
        
            $usuario -> cep = strip_tags($_POST['cep']);
            $usuario -> logradouro = strip_tags($_POST['rua']);
            $usuario -> complemento = strip_tags($_POST['complemento']);
            $usuario -> bairro = strip_tags($_POST['bairro']);
            $usuario -> localidade = strip_tags($_POST['cidade']);
            $usuario -> uf = strip_tags($_POST['uf']);
            $usuario -> ddd = strip_tags($_POST['ddd']);
            $usuario -> tipoLocal = strip_tags($_POST['tipoLocal']);
        
            if($usuario -> CadastrarUsuarioLocalizacao() == 1){
                header('Location: gerenciamento_clientes.php?sucesso=cadastrarcliente');
            
            }else{
                header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
            }
        }
    }

    //Cadastrando um funcionário

    $usuario = new Usuario();

    $usuario->nome = strip_tags($_POST['nomeFuncionario']);
    $usuario->email = strip_tags($_POST['emailFuncionario']);
    $usuario->senha = strip_tags($_POST['senhaFuncionario']);
    $usuario->cpf = strip_tags($_POST['cpfFuncionario']);
    $usuario->data_nascimento = strip_tags($_POST['data_nascimentoFuncionario']);
    $usuario->telefone_celular = strip_tags($_POST['telefone_celularFuncionario']);
    $usuario->telefone_residencial = strip_tags($_POST['telefone_residencialFuncionario']);
    $usuario->id_localizacao = strip_tags($_POST['id_localizacaoFuncionario']);
    $usuario->id_convenio = strip_tags($_POST['id_convenioFuncionario']);
    $usuario->id_cargo = strip_tags($_POST['id_cargoFuncionario']);
    $usuario->id_especialidade = strip_tags($_POST['id_especialidadeFuncionario']);
    $usuario->situacao = 1;



}else{
    header('Location: gerenciamento_clientes.php?falha=cadastrarcliente');
}


?>