<?php

header('Content-Type: application/json');
session_start();
if (isset($_SESSION['usuario'])) {
        require_once('../../classes/Cargos.Class.php');
        $c = new Cargos();

        $resultado = $c->Listar();

        echo json_encode($resultado);
} else {
        echo json_encode([]);
}

?>
