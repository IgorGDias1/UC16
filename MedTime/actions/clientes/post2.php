<?php

header('Content-Type: application/json');
session_start();
if (isset($_SESSION['usuario'])) {
        require_once('../../classes/Especialidade.Class.php');
        $e = new Especialidade();

        $resultado = $e->Listar();

        echo json_encode($resultado);
} else {
        echo json_encode([]);
}

?>
