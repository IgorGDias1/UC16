<?php

        header('Content-Type: application/json');
    
        require_once('../../classes/Cargos.Class.php');
        $c = new Cargos();

        $resultado = $c->Listar();

        echo json_encode($resultado);
?>