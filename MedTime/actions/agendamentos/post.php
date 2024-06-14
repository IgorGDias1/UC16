<?php

        header('Content-Type: application/json');
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require_once('../../classes/Usuario.Class.php');
                $u = new Usuario();

                $u->cpf = strip_tags($_GET['cpf']); 
        
                $resultado = $u->ListarPorCPF();
            
                echo json_encode($resultado);
        }else{
                echo json_encode([]);
        }
       
?>