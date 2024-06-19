<?php

// Verificar se a pagina foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('../../classes/Usuario.class.php');

        $usuario = new Usuario();
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $resultado = $usuario->Logar();

        if(count($resultado) < 1) {
            header('Location: ../../index.php?falha=logar');
            die();
        }

        if($resultado[0]['id_cargo'] == NULL && count($resultado) == 1){
            session_start();

            $_SESSION['usuario'] = $resultado[0];
            header('Location: ../../index.php?sucesso=logar');
            die();
        } else {
            session_start();

            $_SESSION['usuario'] = $resultado[0];
            header('Location: ../../index.php?sucesso=logar');
            die();
        }
            
    }else{
        header('Location: ../../index.php?falha=post');
        die();
    }

?>

<script>

</script>