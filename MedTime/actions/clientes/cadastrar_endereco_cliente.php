<?php

session_start();

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

    //Verificando se o CEP já está cadastrado no banco de dados
    $resultado = $localizacao->VerificarSeExiste(); 

    foreach($resultado as $r){
        $idL = $r['id'];
    }

    require_once('../../classes/Usuario.class.php');
    $usuario = new Usuario();

    $usuario -> id = $_SESSION['usuario']['id'];

    //Caso o CEP já exista no banco de dados
    if(count($resultado) == 1){
        require_once('../../classes/Usuario.class.php');
        $usuario = new Usuario();

        $usuario -> id = $_SESSION['usuario']['id'];
        // Atribuidno o CEP já existente ao usuario
        $usuario -> id_localizacao = $r['id']; 

        // Método para editar o usuario e atribuir o id_localizacao
        if($usuario -> AdicionarLocalizacao()){
            $_SESSION['usuario']['id_localizacao'] = $r['id']; 
            header('Location: ../../perfil.php?sucesso=cadastrarlocalizacao');
            die();
        } else {
            header('Location: ../../perfil.php?falha=cadastrarlocalizacao');
            die();
        }
        // Caso o CEP não exista no banco de dados
    } else {
        // Método para cadastrar uma localização e atribuir o LAST_INSERT_ID ao usuario
        if($usuario -> CadastrarLocalizacaoAtribuirAoUsuario() == 1){
            $_SESSION['usuario']['id_localizacao'] = $usuario->id_localizacao;
            header('Location: ../../perfil.php?sucesso=cadastrarlocalizacao');
            die();
        }else{
            header('Location: ../../perfil.php?falha=cadastrarlocalizacao');
            die();
        }
    }

}else{
    header('Location: ../../perfil.php?falha=cadastrarlocalizacao');
    die();
}


?>