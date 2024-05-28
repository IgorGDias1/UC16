<?php

// Verificar se a pagina foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('../../classes/Usuario.class.php');

        $usuario = new Usuario();
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $resultado = $usuario->Logar();

        if($resultado[0]['id_cargo'] == NULL){
            if(count($resultado) == 1){
                session_start();

                $_SESSION['usuario'] = $resultado[0];
                header('Location: ../../paginainicial.htm?sucesso=login');
            }
        } else {
            session_start();

            $_SESSSION['funcionario'] = $resultado[0];
            header('Location: ../clientes/gerenciamento_clientes.php');
        }
            
    }else{
        header('Location: ../../paginainicial.htm?falha=post');
    }

?>

<script>

</script>