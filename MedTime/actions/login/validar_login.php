<?php

// Verificar se a pagina foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('../../classes/Usuario.class.php');

        $usuario = new Usuario();
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $resultado = $usuario->Logar();

        if($resultado[0]['id_cargo'] == NULL && count($resultado) == 1){
            session_start();

            $_SESSION['usuario'] = $resultado[0];
            header('Location: ../../paginainicial.php?sucesso=login');
            die();
        } else {
            session_start();

            $_SESSION['usuario'] = $resultado[0];
            header('Location: ../clientes/gerenciamento_clientes.php?sucesso=login');
            die();
        }
            
    }else{
        header('Location: ../../paginainicial.php?falha=post');
        die();
    }

?>

<script>

</script>