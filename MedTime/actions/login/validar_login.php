<?php

// Verificar se a pagina foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('../../classes/Cliente.class.php');

        $cliente = new Cliente();
        $cliente->email = $_POST['email'];
        $cliente->senha = $_POST['senha'];

        $resultado = $cliente -> Logar();

        if(count($resultado) == 1){
            session_start();
            
            $_SESSION['usuario'] = $resultado[0];
            header('Location: ../clientes/gerenciamento_clientes.php?sucesso=logar');

        }else{
            header('Location: ../../paginainicial.htm?falha=logar');
        }
            
    }else{
        header('Location: ../../paginainicial.htm?falha=post');
    }

?>

<script>

</script>