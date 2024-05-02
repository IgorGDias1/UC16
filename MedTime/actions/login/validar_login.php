<?php

// Verificar se a pagina foi carregada por POST:
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('../../classes/Funcionario.class.php');

        $funcionario = new Funcionario();
        $funcionario->email = $_POST['email'];
        $funcionario->senha = $_POST['senha'];

        $resultado = $funcionario -> Logar();   

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