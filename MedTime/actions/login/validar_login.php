<?php

// Verificar se a pagina foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('classes/Usuario.class.php');

        $usuario = new Usuario();
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $resultado = $usuario -> Logar();

        if(count($resultado) == 1){
            session_start();
            
            $_SESSION['usuario'] = $resultado[0];
            header('Location: ../../paginalinicial.htm?sucesso=logar');

        }else{
            header('Location: ../../paginalinicial.htm?falha=logar');
        }
            
    }else{
        header('Location: ../../paginainicial.htm?falha=post');
    }

?>