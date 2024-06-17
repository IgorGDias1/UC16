<?php

        header('Content-Type: application/json');

         if(isset($_GET['cpf'])){
        require_once('../../classes/Usuario.Class.php');

        $u = new Usuario();
        $u -> cpf = $_GET['cpf'];
        echo json_encode($u->ListarPorCPF());
        
    } else {
        echo json_encode([]);
    }
       
?>